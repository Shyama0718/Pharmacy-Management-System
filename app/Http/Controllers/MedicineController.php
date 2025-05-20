<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class MedicineController extends Controller
{
    public function show($id)
    {
        $medicine = Product::findOrFail($id);
        return view('frontend.show', compact('medicine'));
    }

}
