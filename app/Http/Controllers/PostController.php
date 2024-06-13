<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
    * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::with('category')
        ->when(request('search'), function ($query, $searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('content', 'like', '%' . $searchTerm . '%')
                        ->orWhereHas('category', function ($query) use ($searchTerm) {
                          $query->where('name', 'like', '%' . $searchTerm . '%');
                      });
            });
        })->get();

        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=[
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'price' => 'required',
            'care_description' => 'required',
        ];
        if($request->hasFile('image')){
            $validation['image']='required|mimes:jpg,jpeg,png|file';
        }
        Validator::make($request->all(),$validation)->validate();

      if($request->hasFile('image')){
        $filename =uniqid().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/posts',$filename);
      }

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->price = $request->price;
        $post->care_description = $request->care_description;
        $post->image = $filename;
        $post->save();

        return redirect()->route('post.index')->with(['success'=>'You are created Successfully!']);
   }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('admin.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validation=[
            'title' => 'required|unique:posts,title,'.$request->id,
            'content' => 'required',
            'category' => 'required',
            'care_description' => 'required'
        ];

        if($request->hasFile('image')){
            $validation['image']='required|mimes:jpg,jpeg,png|file';
        }
        Validator::make($request->all(),$validation)->validate();

        if($request->hasFile('image')){
            $oldimage=$post->image;
            if($oldimage != null){
                Storage::delete('public/posts/'.$oldimage);
            }
            $filename =uniqid().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/posts',$filename);
            $post->image = $filename;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->care_description = $request->care_description;
        $post->category_id = $request->category;
        $post->update();
        return redirect()->route('post.index')->with(['success'=>'You are created Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $oldimage=$post->image;
        if($oldimage != null){
            Storage::delete('public/posts/'.$oldimage);
         }

        $post->delete();
        return redirect()->route('post.index')->with(['success'=>'You are Deleted Successfully!']);
    }



}
