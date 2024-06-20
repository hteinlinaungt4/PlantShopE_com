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
use App\Models\payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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


        $existingCart = Cart::where('user_id', $request->user_id)
                        ->where('post_id', $request->post_id)
                        ->first();

                        if ($existingCart) {
                            // If exists, increase the quantity
                            $existingCart->qty += $request->qty;
                            $existingCart->save();

                            $response=[
                                'message' => 'create cart',
                                'status' => 'success',
                            ];
                        } else {
                            // If not, create a new cart entry
                            $cart = new Cart();
                            $cart->user_id = $request->user_id;
                            $cart->post_id = $request->post_id;
                            $cart->qty = $request->qty;
                            $cart->save();
                            $response=[
                                'message' => 'create cart',
                                'status' => 'success',
                            ];
                        }

                        return response()->json($response, 200);
    }



    public function removecart(Request $request){
        Cart::where('id',$request->id)->delete();
     }

     public function bill(Request $request){
        $payment = new payment();
        $payment->orderCode = $request->ordercode;
        $payment->name = $request->name;
        $payment->phone_number = $request->phone_number;
        $payment->email = $request->email;
        $payment->address = $request->address;
        $payment->payment_method = $request->payment_method;
        $payment->save();


        $response=[
            'message' => 'success',
         ];
         return response()->json($response,200);
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

    public function statusupdate(Request $request)
    {

        $orderUpdated = Order::where('id', $request->id)->update(['status' => $request->status]);

        if ($request->status == 1) {
            // Perform the query to get the orderCode
            $ordercodeResult = Order::where('id', $request->id)->select('orderCode')->first();

            if ($ordercodeResult) {
                // Extract the orderCode value
                $ordercode = $ordercodeResult->orderCode;

                // Perform the query to get the order items
                $orderitems = OrderList::where('orderCode', $ordercode)->select('post_id', 'qty')->get();

                // Iterate through each order item
                foreach ($orderitems as $orderitem) {
                    // Get the old quantity from the Post model
                    $post = Post::where('id', $orderitem->post_id)->first();

                    if ($post) {
                        $oldqty = $post->qty;
                        // Ensure the result is not negative
                        $newqty = max(0, $oldqty - $orderitem->qty);

                        // Update the Post model with the new quantity
                        $post->qty = $newqty;

                        // Log the post before saving
                        Logger("Post before save: " . json_encode($post));

                        // Save the updated Post model
                        $saved = $post->save();

                        // Log the new quantity and save status
                        Logger("Post ID: " . $orderitem->post_id . ", Old Qty: " . $oldqty . ", Order Item Qty: " . $orderitem->qty . ", New Qty: " . $newqty . ", Save Status: " . ($saved ? 'Success' : 'Failed'));
                    } else {
                        Logger("Post with ID: " . $orderitem->post_id . " not found.");
                    }
                }

                // Update the order status
                Logger("Order ID: " . $request->id . ", Status Update: " . ($orderUpdated ? 'Success' : 'Failed'));

                return response()->json(['success' => 'Order status updated successfully.']);
            } else {
                Logger("No order found with id: " . $request->id);
                return response()->json(['error' => 'No order found'], 404);
            }
        } else {
            // Handle other statuses if needed
            return response()->json(['error' => 'Invalid status'], 400);
        }
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
