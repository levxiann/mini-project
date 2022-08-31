@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Detail Mahasiswa</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <td>{{$student->nim}}</td>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="col">Nama</th>
                        <td>{{$student->nama}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Lahir</th>
                        <td>{{date('d M Y',strtotime($student->tanggal_lahir))}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Jenis Kelamin</th>
                        <td>{{$student->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Agama</th>
                        <td>{{$student->agama}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Email</th>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr>
                        <th scope="col">No. Telp.</th>
                        <td>{{$student->no_telp}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Alamat</th>
                        <td>{{$student->alamat}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Semester</th>
                        <td>{{$student->semester}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Fakultas</th>
                        <td>{{$student->major->faculty->nama_fakultas}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Jurusan</th>
                        <td>{{$student->major->nama_jurusan}}</td>
                    </tr>
            </tbody>
        </table>
        <a href="{{url('/student')}}" class="btn btn-primary"><span class="fa fa-arrow-left mr-3 notif"></span> Kembali</a>
    </div>
@endsection