@extends('auth.layout.main')

@section('title')
    {{ $title }}
@endsection

@section('container')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Please Register</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form action="{{url('/register')}}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="Username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="confirm-password-field" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                            <span toggle="#confirm-password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
                        </div>
                    </form>
                    <div class="d-md-flex w-100">
                        Have an account ? <a href="{{url('/login')}}"> Login </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection