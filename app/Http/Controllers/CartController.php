<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index (){
        $cart = Cart::with(['user', 'post'])
        ->where('carts.user_id', Auth::user()->id)
        ->get();

        $totalprice=0;
        foreach ($cart as $c) {
            $totalprice +=$c->post->price * $c->qty;
        }

        return view('user.cart',compact('cart','totalprice'));
    }


}
