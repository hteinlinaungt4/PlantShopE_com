@extends('admin.dashboard')
@section('title',"Category")
@section('count')
@endsection
@section('content')
   <div class="card">
    <div class="card-header">
        <h2>Category Edit</h2>
    </div>
    <div class="card-body">
        <form action="{{route('category.update',$category->id)}}" class="w-50 mx-auto" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" value="{{old('name',$category->name)}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Category Name ...">
                @error ('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-warning float-right">Update</button>
        </form>
    </div>
   </div>
@endsection
