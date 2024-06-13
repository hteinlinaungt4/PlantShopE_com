<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderList;
use Illuminate\Log\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{

     // userrolechange
     function userrolechange(Request $request){
        User::where('id',$request->userid)->update([
            'role' => $request->role,
        ]);
        $response=[
            'message' => 'success',
        ];
        return response()->json($response,200);
    }

    public function cart(Request $request){
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->post_id = $request->post_id;
            $cart->qty = $request->qty;
            $cart->save();
            $response=[
                'message' => 'create cart',
                'status' => 'success',
            ];
            return response()->json($response,200);

    }



    public function removecart(Request $request){
        Cart::where('id',$request->id)->delete();
     }



    public function order(Request $request){
        $total=0;

        foreach($request->all() as $item){
         $data=OrderList::create([
            'user_id' => $item['user_id'],
            'post_id' => $item['post_id'],
            'qty' => $item['qty'],
            'total' => $item['total'],
            'orderCode' => $item['ordercode'],
         ]);

         $total +=$data['total'];

        }
        Order::create(
            [
                'user_id' => Auth::user()->id,
                'orderCode' => $data['orderCode'],
                'total_price' => $total ,
            ]
         );
         Cart::where('user_id',Auth::user()->id)->delete();



         $response=[
            'message' => 'success',
         ];
         return response()->json($response,200);
    }

    function statusupdate(Request $request){
        Order::where('id',$request->id)->update([
            'status' => $request->status
        ]);
    }


       // cat filter
       public function filter(Request $request){
        if(!$request->id){
            $posts = Post::orderby('created_at','desc')->get();
        }else{
            $posts = Post::where('category_id',$request->id)->orderby('created_at','desc')->get();
        }
        return response()->json($posts,200);
    }

}
