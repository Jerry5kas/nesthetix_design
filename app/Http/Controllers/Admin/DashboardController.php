<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'theme_settings' => ThemeSetting::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

