<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function index(Request $request){
        $posts = Post::orderby('created_at','desc')->get();
        $category = Category::all();
        return view('user.dashboard',compact('posts','category'));
    }


     // delete
     function delete($id){
        $oldimg=User::select('photo')->where('id',$id)->first()->toArray();
        $oldimg=$oldimg['photo'];
        if(Auth::user()->image != null){
            Storage::delete('public/profile'.$oldimg);
        }
        User::where('id',$id)->delete();
        return back();
    }

    function orderhistory(){
        $order=Order::where('user_id',Auth::user()->id)->get();
        return view('user.orderhistory',compact('order'));
    }


    function detail($id){
        $post=Post::with('category')->where('id',$id)->first();
        $posts=Post::paginate(3);
        return view('user.detail',compact('post','posts'));
    }


}
