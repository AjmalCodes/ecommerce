<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($id) {
        $product = Product::find($id);
        return view('frontend.products.ProductDetail', compact('product'));
    }
}
