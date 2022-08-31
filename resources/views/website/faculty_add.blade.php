@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Tambah Fakultas</h2>
        <form action="{{url('/faculty/store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_fakultas">Kode Fakultas</label>
                <input name="kode_fakultas" type="text" class="form-control @error('kode_fakultas') is-invalid @enderror" id="kode_fakultas" value="{{old('kode_fakultas')}}" placeholder="Kode Fakultas">
                @error('kode_fakultas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_fakultas">Nama Fakultas</label>
                <input name="nama_fakultas" type="text" class="form-control @error('nama_fakultas') is-invalid @enderror" id="nama_fakultas" value="{{old('nama_fakultas')}}" placeholder="Nama Fakultas">
                @error('nama_fakultas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>  
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection