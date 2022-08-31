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
        @error('kode_matkul')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <form action="{{url('/stuless/update/' . $student->nim . '/' . $semester)}}" method="POST">
            @csrf
            @method('patch')
            <table id="tabel" class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Kode Matkul</th>
                        <th scope="col">Nama Matkul</th>
                        <th scope="col">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lessons as $l)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    @if (in_array($l->kode_matkul, $stuless))
                                        <input name="kode_matkul[]" class="kode_matkul" type="checkbox" value="{{$l->kode_matkul}}" id="kode_matkul" checked>
                                    @else
                                        <input name="kode_matkul[]" class="kode_matkul" type="checkbox" value="{{$l->kode_matkul}}" id="kode_matkul">
                                    @endif
                                </div>
                            </th>
                            <td>{{$l->kode_matkul}}</td>
                            <td>{{$l->nama_matkul}}</td>
                            <td>{{$l->sks}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection