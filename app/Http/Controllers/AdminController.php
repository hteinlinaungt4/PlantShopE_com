<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function index(){
        $user = User::all()->count();
        $post = Post::all()->count();
        $category = Category::all()->count();
        $order = Order::all()->count();
        return view('admin.total',compact('user','post','category','order'));
    }

    public function overallcount(){
        $user = User::all()->count();
        $post = Post::all()->count();
        $category = Category::all()->count();
        $order = Order::all()->count();
        return view('admin.total',compact('user','post','category','order'));
    }
//  //changepassword page
//  function changepasswordpage(){
//     return view('admin.changepassword');
// }


// // changepassword
// function changepassword(Request $request){
//         $this->ValidationCheck($request);
//         $id=Auth::user()->id;
//         $oldpassword=User::select('password')->where('id',$id)->first();
//         $oldpassword=$oldpassword->password;
//         if(Hash::check($request->oldpassword,$oldpassword)){
//             $data=[
//                 'password' => Hash::make( $request->newpassword),
//             ];
//             User::where('id',$id)->update($data);
//             Auth::logout();
//             return redirect()->route('auth#loginPage');
//         }else{
//            return back()->with(['doesnot' => 'You are oldpassword does not match!']);
//         }

// }

// admin Account list
function adminlist(){
    $users=User::where('role','admin')->get();
    return view('admin.adminlist.adminlist',compact('users'));
}

// Delete
function admindelete($id){
    $oldimg=User::select('photo')->where('id',$id)->first()->toArray();
    $oldimg=$oldimg['photo'];
    if(Auth::user()->photo != null){
        Storage::delete('public/profile/'.$oldimg);
    }
    User::where('id',$id)->delete();
    return back();
}

// User Account list
function userlist(){
    $users=User::where('role','user')->get();
    return view('admin.userlist.userlist',compact('users'));
}

// edit
function change($id){
    $admin=User::where('id',$id)->first();
    return view('admin.adminaccounts.detail',compact('admin'));
}
// update
function update(Request $request){
    $data=[
        'role'=>$request->role,
    ];
    $id=$request->id;
    User::where('id',$id)->update($data);
    return redirect()->route('admin#list');
}

// Delete
function delete($id){
    $oldimg=User::select('photo')->where('id',$id)->first()->toArray();
    $oldimg=$oldimg['photo'];
    if(Auth::user()->photo != null){
        Storage::delete('public/profile'.$oldimg);
    }
    User::where('id',$id)->delete();
    return back();
}

function contact(){
    $contacts=Contact::get();
    return view('admin.contact.contact',compact('contacts'));
}


// validate
private function ValidationCheck($request){
    $validation=[
        'oldpassword' => 'required|min:6|max:10',
        'newpassword'=> 'required|min:6|max:10',
        'comfirmpassword' => 'required|min:6|max:10|same:newpassword'
    ];
    Validator::make($request->all(),$validation)->validate();
}

    // Data
    private function getData($request){
        $data=[
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ];
        return $data;

    }
}
