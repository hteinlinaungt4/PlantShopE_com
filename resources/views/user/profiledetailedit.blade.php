@extends('user.master.layout')
@section('content')



<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('user/img/bg-img/24.jpg')}});">
        <h2>Profile Detail</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 ">
            <div class="col-lg-8 table-responsive mb-5 mx-auto">
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
                                        <img alt="hello" class="float-right " width="200px" height="200px" style="padding:10px;border-radius:50%" src="{{ asset('storage/profile/'.$user->photo)}}">
                                    </div>
                                @else
                                <div id="select">
                                    <img class="float-right" width="200px" height="200px" style="padding:10px;border-radius:50%" src="{{ asset('storage/default.png')}}" alt="">
                                </div>
                                @endif
                                <div class="mx-auto preview float-right">

                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('user.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
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
                   </div>

            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
@section('script')
    <script>
         $('#file').on('change', function() {
            var file_length=this.files.length;
            $('.hide').html('');
            $('.preview').html('');
            $('#select').html('');
            for (let i = 0; i < file_length; i++) {
                $('.preview').append(`<img class="float-right" width="150px" height="150px" style="object-fit:cover;padding:10px;border-radius:50%"  src="${URL.createObjectURL(event.target.files[i])}"/>`);
            }
    })
    </script>
@endsection
