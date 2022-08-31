@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">KRS</h2>
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
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <td>{{$student->nim}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td>{{$student->nama}}</td>
                </tr>
                <tr>
                    <th scope="row">Semester</th>
                    <td>{{$semester}}</td>
                </tr>
                <tr>
                    <th scope="row">Jurusan</th>
                    <td>{{$student->major->nama_jurusan}}</td>
                </tr>
            </tbody>
        </table>
        <form class="mb-3">
            @csrf
            <div class="form-group">
                <label for="semester">Semester</label>
                <select name="semester" class="form-control" id="semester">
                    @for ($i = 1; $i <= $student->semester; $i++)
                        @if ($semester == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary" ><span class="fa fa-search mt-1 mr-3 notif"></span> check</button>
        </form>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Kode Matkul</th>
                    <th scope="col">Nama Matkul</th>
                    <th scope="col">SKS</th>
                </tr>
            </thead>
            <tbody>
                <?php $sum = 0;  ?>
                @foreach ($stuless as $sl)
                    <tr>
                        <th scope="row">{{$sl->lesson->kode_matkul}}</th>
                        <td>{{$sl->lesson->nama_matkul}}</td>
                        <td>{{$sl->lesson->sks}}</td>
                    </tr>
                    <?php $sum += $sl->lesson->sks;  ?>
                @endforeach
                    <tr>
                        <th scope="row" colspan="2">Total SKS</th>
                        <td>{{$sum}}</td>
                    </tr>
            </tbody>
        </table>
        <form class="d-inline-block" action="{{url('/stuless/edit/' . $student->nim . '/' . $semester)}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-sm btn-warning"><span class="fa fa-edit mt-1 mr-3 notif"></span> edit</button>
        </form>
    </div>
@endsection