<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cloudinary\Cloudinary;
use App\Models\Category;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $products = Product::all();

    //     // Pass the products to the view
    //     // return view('admin.products.home');
    //     return view('admin.products.home', compact('products'));
    // }
    public function index()
    {
        $products = Product::all();

        // dd($products); // Check the data

        return view('admin.products.home', compact('products'));
    }


    public function create()
    {
        return view('admin.products.add_medicine');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'mfg_date' => 'required|date',
            'expiry_date' => 'required|date|after:mfg_date',
            'city' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);


        $imageUrl = null;
        if ($request->hasFile('image')) {

            $uploadedFile = $request->file('image');


            $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

            $uploadResult = $cloudinary->uploadApi()->upload($uploadedFile->getRealPath(), [
                'folder' => 'product_images',
            ]);


            $imageUrl = $uploadResult['secure_url'];
        }
        // dd($imageUrl);


        Product::create([
            'name' => $validated['product_name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'mfg_date' => $validated['mfg_date'],
            'expiry_date' => $validated['expiry_date'],
            'city' => $validated['city'],
            'pincode' => $validated['pincode'],
            'image' => $imageUrl,

        ]);

        return redirect()->route('admin.product')->with('success', 'Medicine added successfully!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit_medicine', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'mfg_date' => 'required|date',
            'expiry_date' => 'required|date|after:mfg_date',
            'city' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $imageUrl = $product->image;
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
            $uploadResult = $cloudinary->uploadApi()->upload($uploadedFile->getRealPath(), [
                'folder' => 'product_images',
            ]);
            $imageUrl = $uploadResult['secure_url'];
        }
        // Update the product
        $product->update([
            'name' => $validated['product_name'],
            'price' => $validated['price'],
             'category_id' => $validated['category_id'],
            'mfg_date' => $validated['mfg_date'],
            'expiry_date' => $validated['expiry_date'],
            'city' => $validated['city'],
            'pincode' => $validated['pincode'],
            'image' => $imageUrl,
        ]);
        // dd($request->category_id);
        return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');
    }

    public function showLandmarkMedicines()
    {
        $medicines = Product::where('category', 'Landmark')->get();
        return view('your_view_file', compact('medicines'));
    }

    public function getCategories()
    {
        $categories = Category::select('id', 'name')->get();
        return response()->json($categories);
    }
}
