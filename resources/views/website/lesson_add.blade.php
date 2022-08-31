@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Tambah Mata Kuliah</h2>
        <form action="{{url('/lesson/store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_matkul">Kode Mata Kuliah</label>
                <input name="kode_matkul" type="text" class="form-control @error('kode_matkul') is-invalid @enderror" id="kode_matkul" value="{{old('kode_matkul')}}" placeholder="Kode Mata Kuliah">
                @error('kode_matkul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_matkul">Nama Mata Kuliah</label>
                <input name="nama_matkul" type="text" class="form-control @error('nama_matkul') is-invalid @enderror" id="nama_matkul" value="{{old('nama_matkul')}}" placeholder="Nama Mata Kuliah">
                @error('nama_matkul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input name="sks" type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" value="{{old('sks')}}" placeholder="SKS">
                @error('sks')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kode_jurusan">Jurusan</label>
                <select name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan">
                    @foreach ($majors as $m)
                        @if (old('kode_jurusan') == $m->kode_jurusan)
                            <option value="{{$m->kode_jurusan}}" selected>{{$m->nama_jurusan}}</option>
                        @else
                            <option value="{{$m->kode_jurusan}}">{{$m->nama_jurusan}}</option>
                        @endif
                        
                    @endforeach
                </select>
                @error('kode_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <select name="semester" class="form-control @error('semester') is-invalid @enderror" id="semester">
                    <option value="1" {{old('semester') == 1 ?'selected' : ''}}>1</option>
                    <option value="2" {{old('semester') == 2 ?'selected' : ''}}>2</option>
                    <option value="3" {{old('semester') == 3 ?'selected' : ''}}>3</option>
                    <option value="4" {{old('semester') == 4 ?'selected' : ''}}>4</option>
                    <option value="5" {{old('semester') == 5 ?'selected' : ''}}>5</option>
                    <option value="6" {{old('semester') == 6 ?'selected' : ''}}>6</option>
                    <option value="7" {{old('semester') == 7 ?'selected' : ''}}>7</option>
                    <option value="8" {{old('semester') == 8 ?'selected' : ''}}>8</option>
                </select>
                @error('semester')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection