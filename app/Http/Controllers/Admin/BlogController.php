<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\ImageKitService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class BlogController extends Controller
{
    protected ImageKitService $imageKitService;

    public function __construct(ImageKitService $imageKitService)
    {
        $this->imageKitService = $imageKitService;
    }

    /**
     * Display a listing of blogs.
     */
    public function index(Request $request): View
    {
        $query = Blog::query();

        // Search by title
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by published status
        if ($request->has('published') && $request->published !== '') {
            $isPublished = filter_var($request->published, FILTER_VALIDATE_BOOLEAN);
            $query->where('is_published', $isPublished);
        }

        // Order by latest first
        $query->latest();

        $blogs = $query->paginate(20);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create(): View
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'image' => 'nullable|image|max:10240', // 10MB max
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title must not exceed 255 characters.',
            'slug.unique' => 'This slug is already in use.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image size must not exceed 10MB.',
            'excerpt.max' => 'Excerpt must not exceed 500 characters.',
        ]);

        try {
            $data = [
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'excerpt' => $request->input('excerpt'),
                'content' => $request->input('content'),
                'is_published' => $request->has('is_published') ? (bool) $request->input('is_published') : false,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                
                $uploadResult = $this->imageKitService->upload(
                    $file,
                    'blogs',
                    null,
                    []
                );

                if (!$uploadResult['success']) {
                    throw new Exception('Image upload failed');
                }

                $data['image'] = $uploadResult['url'];
                $data['image_file_id'] = $uploadResult['fileId'] ?? null;
            }

            Blog::create($data);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog created successfully!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to create blog: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog): View
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog): View
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'image' => 'nullable|image|max:10240', // 10MB max
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title must not exceed 255 characters.',
            'slug.unique' => 'This slug is already in use.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image size must not exceed 10MB.',
            'excerpt.max' => 'Excerpt must not exceed 500 characters.',
        ]);

        try {
            $data = [
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'excerpt' => $request->input('excerpt'),
                'content' => $request->input('content'),
                'is_published' => $request->has('is_published') ? (bool) $request->input('is_published') : false,
            ];

            // Handle image upload/replacement
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                
                // Delete old image from ImageKit if file_id exists
                if ($blog->image_file_id) {
                    try {
                        $this->imageKitService->delete($blog->image_file_id);
                    } catch (Exception $e) {
                        // Log error but continue with new upload
                        \Log::warning('Failed to delete old blog image from ImageKit: ' . $e->getMessage(), [
                            'file_id' => $blog->image_file_id,
                            'blog_id' => $blog->id,
                        ]);
                    }
                }
                
                $uploadResult = $this->imageKitService->upload(
                    $file,
                    'blogs',
                    null,
                    []
                );

                if (!$uploadResult['success']) {
                    throw new Exception('Image upload failed');
                }

                $data['image'] = $uploadResult['url'];
                $data['image_file_id'] = $uploadResult['fileId'] ?? null;
            }

            $blog->update($data);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog updated successfully!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to update blog: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified blog.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        try {
            // Delete image from ImageKit if file_id exists
            if ($blog->image_file_id) {
                try {
                    $this->imageKitService->delete($blog->image_file_id);
                } catch (Exception $e) {
                    // Log error but continue with database deletion
                    \Log::warning('Failed to delete blog image from ImageKit: ' . $e->getMessage(), [
                        'file_id' => $blog->image_file_id,
                        'blog_id' => $blog->id,
                    ]);
                }
            }
            
            $blog->delete();

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog deleted successfully!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete blog: ' . $e->getMessage()]);
        }
    }
}
