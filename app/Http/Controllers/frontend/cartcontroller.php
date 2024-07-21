<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
use Illuminate\Support\Facades\Auth;


class cartcontroller extends Controller
{

    public function addCart(Request $req){

        $product_id = $req->input('product_id');
        if(cart::where('prod_id' , $product_id)->where('user_id' , Auth::id())->first()){
        return redirect('/cart')->with('status' , 'Product Already In the cart');
        }
        else{
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->prod_id = $req->product_id;
            $cart->save();
            return redirect('/')->with('status' , 'Product Added To Cart SuccessFully');
        }

    }

    public function viewcart(){
        $cart = Cart::where('user_id' , Auth::id())->get();
        return view('frontend.products.cart' , compact('cart'));
    }

    public function removecart($id){
        cart::destroy($id);
        return redirect('/cart');
    }

    public function cratCount()
    {
        $userId = Auth::id();
        $cartCount = Cart::where('user_id', $userId)->count();

        return response()->json(['itemCount' => $cartCount]);
    }

    public function search(Request $req){

        $data = product::where('name' , `like` , '%' . $req->input('query') . '%')->get();
        return view('frontend.search' , ['products' =>$data]);
    }
}
