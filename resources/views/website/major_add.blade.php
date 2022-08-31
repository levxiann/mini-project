@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Tambah Jurusan</h2>
        <form action="{{url('/major/store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_jurusan">Kode Jurusan</label>
                <input name="kode_jurusan" type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan" value="{{old('kode_jurusan')}}" placeholder="Kode Jurusan">
                @error('kode_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input name="nama_jurusan" type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" value="{{old('nama_jurusan')}}" placeholder="Nama Jurusan">
                @error('nama_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kode_fakultas">Fakultas</label>
                <select name="kode_fakultas" class="form-control @error('kode_fakultas') is-invalid @enderror" id="kode_fakultas">
                    @foreach ($faculties as $f)
                        @if (old('kode_fakultas') == $f->kode_fakultas)
                            <option value="{{$f->kode_fakultas}}" selected>{{$f->nama_fakultas}}</option>
                        @else
                            <option value="{{$f->kode_fakultas}}">{{$f->nama_fakultas}}</option>
                        @endif
                        
                    @endforeach
                </select>
                @error('kode_fakultas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>  
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection