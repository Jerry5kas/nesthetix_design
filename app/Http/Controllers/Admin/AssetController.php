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
        if ($request->has('active') && $request->active !== '') {
            $isActive = filter_var($request->active, FILTER_VALIDATE_BOOLEAN);
            $query->where('is_active', $isActive);
        }
        // If no active filter, show all assets

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
     * Show the form for creating a new asset.
     */
    public function create(): View
    {
        $types = Asset::getTypes();
        return view('admin.assets.create', compact('types'));
    }

    /**
     * Store a newly uploaded asset.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'max:51200', // 50MB max
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $mimeType = $value->getMimeType();
                        $allowedMimes = [
                            // Images
                            'image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml',
                            // Videos
                            'video/mp4', 'video/mpeg', 'video/quicktime', 'video/x-msvideo', 'video/webm',
                            // Documents
                            'application/pdf',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        ];
                        
                        if (!in_array($mimeType, $allowedMimes)) {
                            $fail('The file type is not allowed. Allowed types: Images, Videos, PDF, Documents.');
                        }
                    }
                },
            ],
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|in:image,icon,video,document,pdf,svg,file',
            'folder' => 'nullable|string|max:255|regex:/^[a-z0-9\/_-]+$/i',
        ], [
            'file.required' => 'Please select a file to upload.',
            'file.max' => 'The file size must not exceed 50MB.',
            'folder.regex' => 'Folder name can only contain letters, numbers, slashes, hyphens, and underscores.',
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
        if (request()->wantsJson() || request()->ajax() || request()->expectsJson()) {
            return response()->json([
                'id' => $asset->id,
                'title' => $asset->title,
                'type' => $asset->type,
                'is_active' => $asset->is_active,
                'file_path_url' => $asset->file_path_url,
                'file_id' => $asset->file_id,
                'created_at' => $asset->created_at?->toDateTimeString(),
                'updated_at' => $asset->updated_at?->toDateTimeString(),
            ]);
        }

        return view('admin.assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified asset.
     */
    public function edit(Asset $asset): View
    {
        $types = Asset::getTypes();
        return view('admin.assets.edit', compact('asset', 'types'));
    }

    /**
     * Update the specified asset.
     */
    public function update(Request $request, Asset $asset): JsonResponse|RedirectResponse
    {
        $request->validate([
            'file' => 'nullable|file|max:51200', // 50MB max, optional
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:image,icon,video,document,pdf,svg,file',
            'is_active' => 'nullable|boolean',
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title must not exceed 255 characters.',
            'type.required' => 'Type is required.',
            'type.in' => 'Invalid asset type selected.',
            'file.max' => 'The file size must not exceed 50MB.',
        ]);

        try {
            $updateData = [
                'title' => $request->input('title'),
                'type' => $request->input('type'),
                'is_active' => $request->has('is_active') ? (bool) $request->input('is_active') : false,
            ];

            // Handle file replacement if a new file is uploaded
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                // Delete old file from ImageKit if fileId exists
                if ($asset->file_id) {
                    try {
                        $this->imageKitService->delete($asset->file_id);
                    } catch (Exception $e) {
                        // Log error but continue with new upload
                        \Log::warning('Failed to delete old file from ImageKit: ' . $e->getMessage(), [
                            'file_id' => $asset->file_id,
                            'asset_id' => $asset->id,
                        ]);
                    }
                }

                // Determine file type if not provided or if it changed
                $mimeType = $file->getMimeType();
                $detectedType = ImageKitService::getFileTypeFromMime($mimeType);
                
                // Check if it's an icon (small image file)
                if ($detectedType === 'image' && ImageKitService::isIcon($file)) {
                    $detectedType = Asset::TYPE_ICON;
                }

                // Update type if it changed
                if ($detectedType !== $updateData['type']) {
                    $updateData['type'] = $detectedType;
                }

                // Upload new file to ImageKit
                $uploadResult = $this->imageKitService->upload(
                    $file,
                    null, // Use default folder
                    null, // Use auto-generated filename
                    []
                );

                if (!$uploadResult['success']) {
                    throw new Exception('Failed to upload new file');
                }

                // Update with new file information
                $updateData['file_path_url'] = $uploadResult['url'];
                $updateData['file_id'] = $uploadResult['fileId'] ?? null;
            }
            
            $asset->update($updateData);

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
