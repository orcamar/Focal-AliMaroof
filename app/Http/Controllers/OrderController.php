<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(){

        $orders=Order::all();
        $products=Product::all();
        return view('Admin.viewOrder',compact('orders','products'));

    }
    public function destroy(string $id){

        $order=Order::find($id);
        $order->delete();
        return back();
        
    }
    public function searchByProduct(string $id){

        $products=Product::find($id);
        return view('Admin.search',compact('products'));
        
    }
}
