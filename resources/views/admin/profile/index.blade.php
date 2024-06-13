@extends('admin.dashboard')
@section('title',"Post")
@section('count')
@endsection
@section('content')
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
                        <img alt="hello" class="float-right " width="150px" height="150px" style="border:5px solid black;padding:10px;border-radius:50%" src="{{ asset('storage/profile/'.$user->photo)}}">
                    </div>
                @else
                <div id="select">
                    <img class="float-right" width="150px" height="150px" style="border:5px solid black;padding:10px;border-radius:50%" src="{{ asset('storage/default.png')}}" alt="">
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
                    <a href="{{route('admin.profile.edit',Auth::user()->id)}}"  class="btn btn-warning btn-lg">Edit</a>
                </div>

            </div>
        </div>
    </div>
   </div>
@endsection
@section('script')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('success-message');

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage.innerText,
            });
         }
        });
    </script>
@endsection
