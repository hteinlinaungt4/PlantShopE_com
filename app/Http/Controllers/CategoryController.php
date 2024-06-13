<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories=Category::when(request('search'),function($cat){
            $key=request('search');
            $cat->where('name','like','%'.$key.'%')->get();
        })->orderBy('created_at','desc')->paginate(12);

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            'name' => 'required|unique:categories,name'
        ];
        Validator::make($request->all(),$validation)->validate();
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success',"Your Created Successfull!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findorfail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::findorFail($id);
        $category->name = $request->name;
        $category->update();
        return redirect()->route('category.index')->with('success',"You are Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findorFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success',"You are Deleted Successfully!");
    }
}
