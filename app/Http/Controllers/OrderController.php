<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    function orderdetail($code){
        $order=OrderList::with('order','user','post')
        ->where('orderCode',$code)
        ->get();
        $totalorder=Order::where('orderCode',$code)->get();
        return view('admin.order.orderdetail',compact('order','totalorder'));
    }

    function orderlist(){
        $order=Order::with('user')
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.order.list',compact('order'));
    }
}
