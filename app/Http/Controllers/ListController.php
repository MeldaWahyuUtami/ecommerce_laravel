<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;

class ListController extends Controller
{
    public function index()
    {
        $users = User::all();
        $admins = Admin::all();

        return view('welcome', compact('users', 'admins'));
    }
}
