@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Profile</h2>
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <td>{{Auth::user()->id}}</td>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="col">Name</th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Username</th>
                        <td>{{Auth::user()->username}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Email</th>
                        <td>{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Role</th>
                        <td>
                            @if (Auth::user()->role == 'A')
                                Admin
                            @else
                                Super Admin
                            @endif
                        </td>
                    </tr>
            </tbody>
        </table>
        <form class="d-inline-block" action="{{url('/profile/edit')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-sm btn-warning" style="display: inline-block;"><span class="fa fa-edit mt-1 mr-3 notif"></span> edit</button>
        </form>
    </div>
@endsection