<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function index(){
        $user=User::findorFail(Auth::user()->id);

        return view('admin.profile.index',compact('user'));
    }
    public function edit($id){
        $user=User::findorFail($id);
        return view('admin.profile.edit',compact('user'));
    }

    public function update(Request $request,$id){
        $validation=[
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'address' => 'required',
        ];
        if($request->hasFile('photo')){
            $validation['photo']='mimes:jpg,jpeg,png|file';
        }
        Validator::make($request->all(),$validation)->validate();
        $user=User::findorFail($id);

        if($request->hasFile('photo')){
            $oldimage=$user->photo;
            if($oldimage != null){
                Storage::delete('public/profile/'.$oldimage);
            }
            $filename =uniqid().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/profile',$filename);
            $user->photo = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        if($request->hasFile('photo')){
            $user->photo = $filename;
        }
        $user->update();
        return redirect()->route('admin.profile')->with(['success'=>"You are Updated Successfully!"]);
    }

    public function useredit($id){
        $user=User::findorFail($id);
        return view('user.profiledetailedit',compact('user'));
    }


    public function userupdate(Request $request,$id){
        $validation=[
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'address' => 'required',
        ];
        if($request->hasFile('photo')){
            $validation['photo']='mimes:jpg,jpeg,png|file';
        }
        Validator::make($request->all(),$validation)->validate();
        $user=User::findorFail($id);

        if($request->hasFile('photo')){
            $oldimage=$user->photo;
            if($oldimage != null){
                Storage::delete('public/profile/'.$oldimage);
            }
            $filename =uniqid().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/profile',$filename);
            $user->photo = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        if($request->hasFile('photo')){
            $user->photo = $filename;
        }
        $user->update();
        return redirect()->route('user.profiledetail')->with(['success'=>"You are Updated Successfully!"]);
    }


    public function userprofiledetail(){
        $user=User::findorFail(Auth::user()->id);

        return view('user.profiledetail',compact('user'));
    }
}
