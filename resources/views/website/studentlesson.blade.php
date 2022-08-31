@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Pengambilan Mata Kuliah</h2>
        <table id="tabel" class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">KRS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $s)
                    <tr>
                        <th scope="row">{{$s->nim}}</th>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->semester}}</td>
                        <td>{{$s->major->nama_jurusan}}</td>
                        <td>
                            <a href="{{url('/stuless/' . $s->nim)}}" class="btn btn-sm btn-secondary"><span class="fa fa-exclamation mt-1 mr-3 notif"></span> detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection