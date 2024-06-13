@extends('master.layout')
@section('title',"Register")
@section('content')
    <div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('user/img/bg-img/1.jpg')}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
                <form action="{{route('login')}}" class="login100-form validate-form p-b-33 p-t-5" method="post">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input  class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        @error ('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Password">
						<input type="password" class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @error ('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>
                    <div class="float-right p-3">
                        <p>Don't you have account? <a style="color:green; font-weight:bold" href="{{route('register')}}">Sign Up Here</a></p>
                    </div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

@endsection
