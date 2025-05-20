<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $medicines = Product::where('category', 'Landmark')->get();
    //     return view('welcome', compact('medicines'));
    // }
    public function index()
    {
        $medicines = Product::all(); // fetch all products
        return view('welcome', compact('medicines'));
    }
}
