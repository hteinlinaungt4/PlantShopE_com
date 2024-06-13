@extends('admin.dashboard')
@section('title',"Post")
@section('count')
@endsection
@section('content')
   <div class="card">
    <div class="card-header">
        <div class="card-title">
            <h1>Profile</h1>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">

                @if($user->photo)
                    <div class="hide">
                        <img alt="hello" class="float-right " width="150px" height="150px" style="border:5px solid black;padding:10px;border-radius:50%" src="{{ asset('storage/profile/'.$user->photo)}}">
                    </div>
                @else
                <div id="select">
                    <img class="float-right" width="150px" height="150px" style="border:5px solid black;padding:10px;border-radius:50%" src="{{ asset('storage/default.png')}}" alt="">
                </div>
                @endif
                <div class="mx-auto preview float-right">

                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex align-items-center mb-3 ">
                        <h2 class="mr-3 d-flex"><i class="fa-solid fa-user mr-3 " style="color: black"></i><span style="color: black">Image</span></h2>
                        <input id="file" type="file" class="form-control" name="photo">
                    </div>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="d-flex align-items-center mb-3 ">
                        <h2 class="mr-3 d-flex"><i class="fa-solid fa-user mr-3 " style="color: black"></i><span style="color: black">Name</span></h2>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="d-flex align-items-center mb-3">
                        <h2 class="mr-3 d-flex"><i class="fa-regular fa-envelope mr-3" style="color: black"></i><span style="color: black">Email</span></h2>
                        <input type="text" name="email" class="form-control" value="{{$user->email}}">
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="d-flex align-items-center mb-3">
                        <h2 class="mr-3 d-flex"><i class="fa-solid fa-map-location mr-3" style="color: black"></i><span style="color:black">Address</span></h2>
                        <textarea name="address" class="form-control"  rows="4">{{$user->address}}</textarea>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">
                    <div>
                        <button class="btn btn-warning btn-lg">update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
   </div>
@endsection
@section('script')
    <script>
         $('#file').on('change', function() {
            var file_length=this.files.length;
            $('.hide').html('');
            $('.preview').html('');
            $('#select').html('');
            for (let i = 0; i < file_length; i++) {
                $('.preview').append(`<img class="float-right" width="150px" height="150px" style="border:5px solid black;padding:10px;border-radius:50%"  src="${URL.createObjectURL(event.target.files[i])}"/>`);
            }
    })
    </script>
@endsection
