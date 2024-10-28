<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
      

    
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);
$user=Auth::user();
// $token=$user->createToken('Api token')->plainTextToken;
if($user){

    $name=$user->name;
    $email=$user->email;
}
else{
    return response()->json(['message'=>'User not authinticated'],401);
}
        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'custumer_name' => $name,
            'custumer_email' => $email,
            'product_price' => $product->price,
        ]);

        return response()->json(['message' => 'Order placed successfully', 'order' => $order], 201);
    }
}

