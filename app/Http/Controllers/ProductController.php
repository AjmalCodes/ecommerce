<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;


class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('products.index' , compact('product'));
    }

    public function create(){
        $category = category::all();
        return view('products.addprod' , compact('category'));
    }

    public function store(Request $req){
        $product = new product();
        $product->cate_id = $req->cate_id;
        $product->name = $req->name;
        $product->slug = $req->slug;
        $product->qty = $req->qty;
        $product->selling_price = $req->selling_price;
        $product->original_price = $req->original_price;
        $product->status = $req->status == True ? '1' : '0';
        $product->popular = $req->popular == True ? '1' : '0';
        $product->meta_title = $req->meta_title;
        $product->meta_keywords = $req->meta_keywords;
        $product->description = $req->description;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/uploads/product' , $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect('products')->with('status' , 'Product added SuccessFully');
    }

    public function delete($id){
        $product = product::find($id);
        $destnitation = 'assets/uploads/product/'.$product->image;
        if(file::exists($destnitation)){
            file::delete($destnitation);
        }
        $product->delete();
        return redirect('products')->with('status' , 'Product deleted SuccessFully');
    }

    public function edit($id){
        $product = product::find($id);
        return view('products.editprod' , compact('product'));
    }

    public function update(Request $req , $id){
        $product = product::find($id);
        $product->name = $req->name;
        $product->slug = $req->slug;
        $product->qty = $req->qty;
        $product->selling_price = $req->selling_price;
        $product->original_price = $req->original_price;
        $product->status = $req->status == True ? '1' : '0';
        $product->popular = $req->popular == True ? '1' : '0';
        $product->meta_title = $req->meta_title;
        $product->meta_keywords = $req->meta_keywords;
        $product->description = $req->description;
        if($req->hasFile('image')){
            $destnitation = 'assets/uploads/product/'.$product->image;
            if(file::exists($destnitation)){
                file::delete($destnitation);
            }
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/uploads/product' , $filename);
            $product->image = $filename;
        }
        $product->update();
        return redirect('products')->with('status' , 'Product updated SuccessFully');
    }

}
