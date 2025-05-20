<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->isMethod('get')) {
            return response()->json([
                'status' => false,
                'message' => '405 Method Not Allowed: Only GET method is allowed.'
            ], 405);
        }

        $products = Product::all();

        return response()->json([
            'status' => true,
            'message' => 'Product list fetched successfully.',
            'data' => $products
        ], 200);
    }
}
