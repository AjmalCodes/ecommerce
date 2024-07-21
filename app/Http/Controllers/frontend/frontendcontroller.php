<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\category;

use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    public function front(){
        return view('layouts.frontend');
    }
    public function index(){
        $featured_products = product::where('popular' , '1')->take('15')->get();
        $trending_category = category::where('popular' , '1')->take('15')->get();
        return view('allfront.trendingcate' , compact('featured_products' , 'trending_category'));
    }

    public function category(){
        $category = Category::where('status' , '0')->get();
        return view('allfront.category' , compact('category'));
    }

    public function view_category($slug){
        if(Category::where('slug' , $slug)->exists()){
            $category = Category::where('slug' , $slug)->first();
            $product = Product::where('cate_id' , $category->id)->where('status' , '0')->get();
            return view('frontend.products.index' , compact('category' , 'product'));
        }else{
            return redirect('/')->with('status' , 'Link Was Broken');
        }
    }



    public function prod_view($cate_slug , $prod_slug){
        if(Category::where('slug' , $cate_slug)->exists()){
            if(Product::where('slug' ,  $prod_slug)->exists()){
                $Product = Product::where('slug' , $prod_slug)->first();
                return view('frontend.products.view' , compact('Product'));
            }else{
                return redirect('/')->with('status' , 'No Such Product Found');
            }
        }else{
            return redirect('/')->with('status' , 'No Such Category Found');
        }
    }

    public function products(Request $request){
        $products = product::where('popular' , '1')->get();
        return view('allfront.products' , compact('products'));
    }

    public function about(){
        return view('about');
    }
}
