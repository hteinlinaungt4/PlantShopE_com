@extends('admin.dashboard')
@section('title',"Post")
@section('count')
@endsection
@section('content')
   <div class="card">
    <div class="card-header">
        <h2>Post</h2>
    </div>
    <div class="card-body">
        <form action="{{route('post.store')}}" class="w-50 mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mx-auto preview" style="width: 150px; height:200px;" >

            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="file" name="image">
                @error ('image')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category" id="" class="form-control">
                   @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Post Title ...">
                @error ('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Care Description</label>
                <textarea  class="form-control @error('care_description') is-invalid @enderror" name="care_description" id="" cols="30" rows="10"></textarea>
                @error ('care_description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter Price ...">
                @error ('price')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="" class="form-control  @error('content') is-invalid @enderror" rows="10" placeholder="Enter Content..."></textarea>
                @error ('content')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary float-right">Create</button>
        </form>
    </div>
   </div>
@endsection
@section('script')
<script>
     $('#file').on('change', function() {
        var file_length=this.files.length;
        $('.preview').html('');
        for (let i = 0; i < file_length; i++) {
            $('.preview').append(`<img class="w-100" src="${URL.createObjectURL(event.target.files[i])}"/>`);
        }
    })
</script>
@endsection
