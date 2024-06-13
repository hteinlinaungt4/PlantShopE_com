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

                            @if (session('success'))
                                <div id="success-message" style="display: none;">{{ session('success') }}</div>
                            @endif
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
                             </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3 ">
                                    <h2 class="mr-3"><i class="fa-solid fa-user mr-3 " style="color: black"></i><span style="color: black">Name</span></h2>
                                    <h2>{{Auth::user()->name}}</h2>
                                </div>
                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="d-flex align-items-center mb-3">
                                    <h2 class="mr-3"><i class="fa-regular fa-envelope mr-3" style="color: black"></i><span style="color: black">Email</span></h2>
                                    <h2>{{Auth::user()->email}}</h2>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="d-flex align-items-center mb-3">
                                    <h2 class="mr-3"><i class="fa-solid fa-map-location mr-3" style="color: black"></i><span style="color:black">Address</span></h2>
                                    <h2>{{Auth::user()->address}}</h2>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="d-flex align-items-center mb-3">
                                    <h2 class="mr-3"><i class="fa-solid fa-shield-halved mr-3" style="color: black"></i><span style="color: black;">Role</span></h2>
                                    <h2>{{Auth::user()->role}}</h2>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="d-flex align-items-center mb-3">
                                    <h2 class="mr-3"><i class="fa-regular fa-clock mr-3" style="color: black"></i><span style="color: black;">Created Account</span></h2>
                                    <h2>{{Auth::user()->created_at}}</h2>
                                </div>
                                <hr class="sidebar-divider d-none d-md-block">

                                <div>
                                    <a href="{{route('user.profile.edit',Auth::user()->id)}}"  class="btn btn-warning btn-lg">Edit</a>
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

