<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display users list.
     */
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        
        return view('admin.users.index', compact('users'));
    }
}

