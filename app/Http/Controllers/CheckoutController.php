<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Product;
use Session;


class CheckoutController extends Controller
{
    public function index() {


       return view('checkout');
    }

    public function placeOrder(Request $request) {

        $total = 0 ;
        foreach(session('cart') as $a) {
            $total += ( $a['quantity']* $a['price'] );
            
         }
        

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->message = $request->input('message');
        $order->address = $request->input('address');
        $order->total = $total;
        $order->save();



       

        foreach(session('cart') as $id => $details)
        {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $details['product_id'],
                'qty' => $details['quantity'],
                'price' => $details['price'],
            ]);

            // $product = Product::where('id', $item->product_id)->first();
            // $product->qty = $product->qty - $item->qty;
            // $product->update();
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();


        session()->forget('cart');
        return redirect('/')->with('success', "Đặt hàng thành công");
    }
}
