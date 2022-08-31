@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Mahasiswa</h2>
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
            <form class="d-inline-block" action="{{url('/student/create')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary" style="display: inline-block;"><span class="fa fa-plus mr-3 notif"></span> Tambah Mahasiswa</button>
            </form>
        </div>
        <table id="tabel" class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Email</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $s)
                    <tr>
                        <th scope="row">{{$s->nim}}</th>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->jenis_kelamin}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->semester}}</td>
                        <td>{{$s->major->nama_jurusan}}</td>
                        <td>
                            <a href="{{url('/student/' . $s->nim)}}" class="btn btn-sm btn-secondary"><span class="fa fa-exclamation mt-1 mr-3 notif"></span> detail</a>
                            <form class="d-inline-block" action="{{url('/student/edit/' . $s->nim)}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning" style="display: inline-block;"><span class="fa fa-edit mt-1 mr-3 notif"></span> edit</button>
                            </form>
                            <form class="d-inline-block" action="{{url('/student/delete/' . $s->nim)}}" method="POST" onclick="return confirm('Hapus Mahasiswa?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" style="display: inline-block;"><span class="fa fa-trash mt-1 mr-3 notif"></span> delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection