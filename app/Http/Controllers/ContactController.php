<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index(){
        return view('user.contactus');
    }

    // create contact
    function contactcreate(Request $request){
        $this->validation($request);
        $data=$this->getData($request);
        Contact::create($data);
        return redirect()->route('user.dashboard');
    }
    // data
    private function getData($request){
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'message'=>$request->message,
        ];
        return $data;
    }


    // validataion
    private function validation($request){
        $validation=[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'phone' => 'required',
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
