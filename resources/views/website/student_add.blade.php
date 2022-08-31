@extends('website.layout.main')

@section('title')
    {{$title}}
@endsection

@section('container')
    {{-- Sidebar --}}
    @include('website.layout.sidebar')

    {{-- Content --}}
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Tambah Mahasiswa</h2>
        <form action="{{url('/student/store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input name="nim" type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" value="{{old('nim')}}" placeholder="NIM">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama Mahasiswa</label>
                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{old('nama')}}" placeholder="Nama Mahasiswa">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input name="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{old('tanggal_lahir')}}" placeholder="Tanggal Lahir">
                @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                    <option value="1" {{old('jenis_kelamin') == 1 ?'selected' : ''}}>Pria</option>
                    <option value="2" {{old('jenis_kelamin') == 2 ?'selected' : ''}}>Wanita</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama">
                    <option value="1" {{old('agama') == 1 ?'selected' : ''}}>Islam</option>
                    <option value="2" {{old('agama') == 2 ?'selected' : ''}}>Katolik</option>
                    <option value="3" {{old('agama') == 3 ?'selected' : ''}}>Protestan</option>
                    <option value="4" {{old('agama') == 4 ?'selected' : ''}}>Buddha</option>
                    <option value="5" {{old('agama') == 5 ?'selected' : ''}}>Hindu</option>
                    <option value="6" {{old('agama') == 6 ?'selected' : ''}}>Konghucu</option>
                </select>
                @error('agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_telp">No. Telp.</label>
                <input name="no_telp" type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" value="{{old('no_telp')}}" placeholder="No. Telp.">
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3">{{old('alamat')}}</textarea>
                @error('alamat')
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
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection