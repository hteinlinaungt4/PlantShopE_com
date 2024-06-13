@extends('user.master.layout')
@section('content')



<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('user/img/bg-img/24.jpg')}});">
        <h2>Contact Us</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
                            <h1>Contact Us</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row px-xl-5">
                                <div class="col-lg-6 mb-5 offset-3">
                                    <div class="contact-form bg-light p-30">
                                        <form  novalidate="novalidate" method="POST"
                                            action="{{route('user.contactcreate')}}">
                                            @csrf
                                            <div class="control-group mb-3">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name"
                                                    name="name"  />
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                            <div class="control-group mb-3">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email"
                                                    name="email"  />
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                            <div class="control-group mb-3">
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Your Phone"  />
                                                @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                            <div class="control-group mb-3">
                                                <textarea class="form-control @error('message') is-invalid @enderror" rows="8" id="message" placeholder="Message" name="message">{{ old('message')}}</textarea>
                                                @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                                    Message</button>
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
                $('.preview').append(`<img class="float-right" width="150px" height="150px" style="object-fit:cover;border:5px solid black;padding:10px;border-radius:50%"  src="${URL.createObjectURL(event.target.files[i])}"/>`);
            }
    })
    </script>
@endsection
