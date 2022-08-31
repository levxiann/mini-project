@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Tambah User</h2>
        <form action="{{url('/user/store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Nama">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{old('username')}}" placeholder="Username">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                    <option value="A" {{old('role') == 'A' ?'selected' : ''}}>Admin</option>
                    <option value="S" {{old('role') == 'S' ?'selected' : ''}}>Super Admin</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection