@extends('auth.layout.main')

@section('title')
    {{ $title }}
@endsection

@section('container')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Please Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{url('/login')}}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                            @error('username')
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
                            <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
                        </div>
                    </form>
                    <div class="d-md-flex w-100">
                        Don't have an account ? <a href="{{url('/register')}}"> Register </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection