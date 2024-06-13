@extends('master.layout')
@section('title',"Register")
@section('content')

    <div class="limiter">
		<div class="container-login100" style=" background-image: url('{{asset('user/img/bg-img/1.jpg')}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Register
				</span>

                <form action="{{route('register')}}" class="login100-form validate-form p-b-33 p-t-5" method="post">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input  class="input100  @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        @error ('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input type="email" class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe822;"></span>
                        @error ('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Enter Address">
                        <textarea  class="input100  @error('address') is-invalid @enderror" name="address"  placeholder="Address"></textarea>
						<span class="focus-input100" data-placeholder="&#xe800;"></span>
                        @error ('address')
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

                    <div class="wrap-input100 validate-input" data-validate = "Enter Comfrim Password">
						<input type="password" class="input100  @error('cm_password') is-invalid @enderror" type="password" name="cm_password" placeholder="Comfirm Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @error ('cm_password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
@endsection
