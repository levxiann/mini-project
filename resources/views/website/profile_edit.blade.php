@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Edit Profile</h2>
        <form action="{{url('/profile/update')}}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name', Auth::user()->name)}}" placeholder="Nama">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{old('username', Auth::user()->username)}}" placeholder="Username">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', Auth::user()->email)}}" placeholder="Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> 
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection