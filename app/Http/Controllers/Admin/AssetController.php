<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Services\ImageKitService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class AssetController extends Controller
{
    protected ImageKitService $imageKitService;

    public function __construct(ImageKitService $imageKitService)
    {
        $this->imageKitService = $imageKitService;
    }

    /**
     * Display a listing of assets.
     */
    public function index(Request $request): View|JsonResponse
    {
        $query = Asset::query();

        // Filter by type if provided
        if ($request->has('type') && $request->type) {
            $query->ofType($request->type);
        }

        // Filter by active status if provided
        if ($request->has('active')) {
            $isActive = filter_var($request->active, FILTER_VALIDATE_BOOLEAN);
            $query->where('is_active', $isActive);
        } else {
            // Default to active only
            $query->active();
        }

        // Search by title
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Order by latest first
        $query->latest();

        // For AJAX requests, return JSON
        if ($request->wantsJson() || $request->ajax()) {
            $assets = $query->paginate($request->get('per_page', 20));
            return response()->json($assets);
        }

        $assets = $query->paginate(20);
        $types = Asset::getTypes();

        return view('admin.assets.index', compact('assets', 'types'));
    }

    /**
     * Store a newly uploaded asset.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|max:51200', // 50MB max
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|in:image,icon,video,document,pdf,svg,file',
            'folder' => 'nullable|string|max:255',
        ]);

        try {
            $file = $request->file('file');
            
            // Determine file type if not provided
            $type = $request->input('type');
            if (!$type) {
                $mimeType = $file->getMimeType();
                $type = ImageKitService::getFileTypeFromMime($mimeType);
                
                // Check if it's an icon (small image file)
                if ($type === 'image' && ImageKitService::isIcon($file)) {
                    $type = Asset::TYPE_ICON;
                }
            }

            // Generate title from filename if not provided
            $title = $request->input('title') ?: pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Upload to ImageKit
            $uploadResult = $this->imageKitService->upload(
                $file,
                $request->input('folder'),
                null,
                []
            );

            if (!$uploadResult['success']) {
                throw new Exception('Upload failed');
            }

            // Store in database
            $asset = Asset::create([
                'title' => $title,
                'type' => $type,
                'file_path_url' => $uploadResult['url'],
                'file_id' => $uploadResult['fileId'] ?? null,
                'is_active' => true,
            ]);

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Asset uploaded successfully',
                    'asset' => $asset,
                ], 201);
            }

            return redirect()->route('admin.assets.index')
                ->with('success', 'Asset uploaded successfully!');
        } catch (Exception $e) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Upload failed: ' . $e->getMessage(),
                ], 500);
            }

            return back()->withErrors(['error' => 'Upload failed: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified asset.
     */
    public function show(Asset $asset): View|JsonResponse
    {
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json($asset);
        }

        return view('admin.assets.show', compact('asset'));
    }

    /**
     * Update the specified asset.
     */
    public function update(Request $request, Asset $asset): JsonResponse|RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|in:image,icon,video,document,pdf,svg,file',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $asset->update($request->only(['title', 'type', 'is_active']));

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Asset updated successfully',
                    'asset' => $asset->fresh(),
                ]);
            }

            return redirect()->route('admin.assets.index')
                ->with('success', 'Asset updated successfully!');
        } catch (Exception $e) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Update failed: ' . $e->getMessage(),
                ], 500);
            }

            return back()->withErrors(['error' => 'Update failed: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified asset.
     */
    public function destroy(Asset $asset): JsonResponse|RedirectResponse
    {
        try {
            // Delete from ImageKit if fileId exists
            if ($asset->file_id) {
                try {
                    $this->imageKitService->delete($asset->file_id);
                } catch (Exception $e) {
                    // Log error but continue with database deletion
                    \Log::warning('Failed to delete file from ImageKit: ' . $e->getMessage(), [
                        'file_id' => $asset->file_id,
                        'asset_id' => $asset->id,
                    ]);
                }
            }
            
            $asset->delete();

            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Asset deleted successfully',
                ]);
            }

            return redirect()->route('admin.assets.index')
                ->with('success', 'Asset deleted successfully!');
        } catch (Exception $e) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Delete failed: ' . $e->getMessage(),
                ], 500);
            }

            return back()->withErrors(['error' => 'Delete failed: ' . $e->getMessage()]);
        }
    }

    /**
     * Toggle asset active status.
     */
    public function toggleActive(Asset $asset): JsonResponse|RedirectResponse
    {
        try {
            $asset->is_active = !$asset->is_active;
            $asset->save();

            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Asset status updated',
                    'is_active' => $asset->is_active,
                ]);
            }

            return back()->with('success', 'Asset status updated!');
        } catch (Exception $e) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Update failed: ' . $e->getMessage(),
                ], 500);
            }

            return back()->withErrors(['error' => 'Update failed: ' . $e->getMessage()]);
        }
    }

    /**
     * Get assets by type (API endpoint).
     */
    public function getByType(string $type): JsonResponse
    {
        $assets = Asset::ofType($type)->active()->get();

        return response()->json([
            'success' => true,
            'assets' => $assets,
        ]);
    }
}
