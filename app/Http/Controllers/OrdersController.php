<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $order = Order::all();
        return view('admin.orders.index', compact('order'));
    }
}
