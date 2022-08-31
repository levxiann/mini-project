@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Users</h2>
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
        <div class="mb-3">
            <form class="d-inline-block" action="{{url('/user/create')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary" style="display: inline-block;"><span class="fa fa-plus mr-3 notif"></span> Tambah User</button>
            </form>
        </div>
        <table id="tabel" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <th scope="row">{{$u->id}}</th>
                        <td>{{$u->name}} @if ($u->id == Auth::user()->id) <a disabled class="btn btn-sm btn-primary text-white ml-2"> me </a> @endif </td>
                        <td>{{$u->username}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            @if ($u->role == 'A')
                                Admin
                            @else
                                Super Admin
                            @endif
                        </td>
                        <td>
                            @if($u->role !== 'S')
                                <form class="d-inline-block" action="{{url('/user/edit/' . $u->id)}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning" style="display: inline-block;"><span class="fa fa-edit mr-3 notif"></span> edit</button>
                                </form>
                                <form class="d-inline-block" action="{{url('/user/delete/' . $u->id)}}" method="POST" onclick="return confirm('Hapus User?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" style="display: inline-block;"><span class="fa fa-trash mr-3 notif"></span> delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection