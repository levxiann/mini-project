@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Mata Kuliah</h2>
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
            <form class="d-inline-block" action="{{url('/lesson/create')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary" style="display: inline-block;"><span class="fa fa-plus mr-3 notif"></span> Tambah Mata Kuliah</button>
            </form>
        </div>
        <table id="tabel" class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $l)
                    <tr>
                        <th scope="row">{{$l->kode_matkul}}</th>
                        <td>{{$l->nama_matkul}}</td>
                        <td>{{$l->sks}}</td>
                        <td>{{$l->major->nama_jurusan}}</td>
                        <td>{{$l->semester}}</td>
                        <td>
                            <form class="d-inline-block" action="{{url('/lesson/edit/' . $l->kode_matkul)}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning" style="display: inline-block;"><span class="fa fa-edit mr-3 notif"></span> edit</button>
                            </form>
                            <form class="d-inline-block" action="{{url('/lesson/delete/' . $l->kode_matkul)}}" method="POST" onclick="return confirm('Hapus Mata Kuliah?')">
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