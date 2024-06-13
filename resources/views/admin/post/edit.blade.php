@extends('admin.dashboard')
@section('title',"Post")
@section('count')
@endsection
@section('content')
   <div class="card">
    <div class="card-header">
        <h2>Post Edit</h2>
    </div>
    <div class="card-body">
        <form action="{{route('post.update',$post->id)}}" class="w-50 mx-auto" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mx-auto preview" style="width: 150px; height:130px;" >
                <div class="mx-auto " id="select" style="width: 150px; height:130px;" >
                    <img  class="w-100 h-100" src="{{asset('storage/posts/'.$post->image)}}" alt="">
                </div>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="file" name="image">
                @error ('image')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <input type="text" hidden  name="id" value="{{$post->id}}">
            <div class="form-group">
                <label for="">Category</label>
                <select name="category" id="" class="form-control">
                   @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($post->category->id == $category->id) selected @endif>{{$category->name}}</option>
                   @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Post Title ...">
                @error ('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="" class="form-control  @error('content') is-invalid @enderror" rows="10" placeholder="Enter Content...">{{$post->content}}</textarea>
                @error ('content')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Care Description</label>
                <textarea name="care_description" id="" class="form-control  @error('care_description') is-invalid @enderror" rows="10" placeholder="Enter Care Description...">{{$post->care_description}}</textarea>
                @error ('care_description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-warning float-right">Update</button>
        </form>
    </div>
   </div>
@endsection
@section('script')
<script>
     $('#file').on('change', function() {
        $('#select').html('');
        var file_length=this.files.length;
        $('.preview').html('');
        for (let i = 0; i < file_length; i++) {
            $('.preview').append(`<img class="w-100" src="${URL.createObjectURL(event.target.files[i])}"/>`);
        }
    })
</script>
@endsection
