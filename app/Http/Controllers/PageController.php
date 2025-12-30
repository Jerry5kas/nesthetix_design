<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the portfolio page.
     */
    public function portfolio(): View
    {
        return view('pages.portfolio');
    }

    /**
     * Display the services page.
     */
    public function services(): View
    {
        return view('pages.services');
    }

    /**
     * Display the about page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the contact page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Display the blog listing page.
     */
    public function blog(): View
    {
        $blogs = \App\Models\Blog::published()->latest()->paginate(12);
        $featuredBlogs = \App\Models\Blog::published()->latest()->take(3)->get();
        
        return view('pages.blog', compact('blogs', 'featuredBlogs'));
    }

    /**
     * Display the blog detail page.
     */
    public function blogDetail(\App\Models\Blog $blog): View
    {
        // Only show published blogs
        if (!$blog->is_published) {
            abort(404);
        }

        // Get related blogs (exclude current blog)
        $relatedBlogs = \App\Models\Blog::published()
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();
        
        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }
}

