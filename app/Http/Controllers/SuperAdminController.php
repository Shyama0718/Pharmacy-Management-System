<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    // public function index()
    // {
    //     return view('superadmin.dashboard');
    // }
    // public function addAdmin()
    // {
    //     return view('superadmin.admin_add');
    // }
    public function index()
{
    // $superadminCount = User::where('usertype', 'superadmin')->count();
    $adminCount = User::where('usertype', 'admin')->count();
    $userCount = User::where('usertype', 'user')->count();

    return view('superadmin.dashboard', compact('adminCount', 'userCount'));
}

    public function showAddAdminForm()
    {
        return view('superadmin.admin_add');
    }
    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'user_type' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->user_type, // Make sure this column exists in your users table
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }
}
