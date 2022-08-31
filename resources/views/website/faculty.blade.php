@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Fakultas</h2>
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
            <form class="d-inline-block" action="{{url('/faculty/create')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary" style="display: inline-block;"><span class="fa fa-plus mr-3 notif"></span> Tambah Fakultas</button>
            </form>
        </div>
        <table id="tabel" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kode Fakultas</th>
                    <th scope="col">Nama Fakultas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $f)
                    <tr>
                        <th scope="row">{{$f->kode_fakultas}}</th>
                        <td>{{$f->nama_fakultas}}</td>
                        <td>
                            <form class="d-inline-block" action="{{url('/faculty/edit/' . $f->kode_fakultas)}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning" style="display: inline-block;"><span class="fa fa-edit mr-3 notif"></span> edit</button>
                            </form>
                            <form class="d-inline-block" action="{{url('/faculty/delete/' . $f->kode_fakultas)}}" method="POST" onclick="return confirm('Hapus Fakultas?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" style="display: inline-block;"><span class="fa fa-trash mr-3 notif"></span> delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection