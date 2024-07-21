<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $req){
        $selectedItems = $req->input('selected_items');
        if (is_null($selectedItems) || count($selectedItems) === 0) {
            return redirect()->back()->with('status', 'No items selected for checkout');
        }
        $cartItem = Cart::where('user_id', Auth::id())->whereIn('id', $selectedItems)->get();
        return view('frontend.products.checkout', compact('cartItem'));
    }

    public function placeorder(Request $req){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $req->input('fname');
        $order->lname = $req->input('lname');
        $order->email = $req->input('email');
        $order->address = $req->input('address');
        $order->phone = $req->input('phone');
        $order->country = $req->input('country');
        $order->city = $req->input('city');
        $order->state = $req->input('state');
        $order->pincode = $req->input('pincode');
        $order->tracking_no = 'moon'.rand(1111,9999);
        $order->save();

        $selectedItems = $req->input('selected_items');
        $cartItem = Cart::where('user_id', Auth::id())->whereIn('id', $selectedItems)->get();

        foreach($cartItem as $item){
            OrderItems::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'price' => $item->products->selling_price,
            ]);
        }

        if(Auth::user()->address == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $req->input('fname');
            $user->lname = $req->input('lname');
            $user->address = $req->input('address');
            $user->phone = $req->input('phone');
            $user->country = $req->input('country');
            $user->city = $req->input('city');
            $user->state = $req->input('state');
            $user->pincode = $req->input('pincode');
            $user->update();
        }

        Cart::destroy($selectedItems);

        return redirect('/')->with('status', 'Congratulations! Your Order has been placed successfully');
    }
}

