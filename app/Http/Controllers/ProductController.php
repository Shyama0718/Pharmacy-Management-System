<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        // Pass the products to the view
        // return view('admin.products.home');
        return view('admin.products.home', compact('products'));
    }
}
