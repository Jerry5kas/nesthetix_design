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
}

