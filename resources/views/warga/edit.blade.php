@extends('master')
@section('title','Pemerintah Kota Bekasi')
@section('menu1','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: maroon;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data Warga</h2>
                <p>Masukkan data Kelurahan dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('warga.update', ['warga' => $warga->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" class="form-control" value="{{old('nik') ?? $warga->nik}}">
                        @error('nik')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Kelurahan" class="form-control" value="{{old('nama') ?? $warga->nama}}">
                        @error('nama')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kelurahan_id" class="form-label">Kelurahan</label>
                        <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                            <option selected disabled>Pilih Kelurahan</option>
                            @foreach($kelurahans as $kelurahan)
                            <option value="{{ $kelurahan->id }}" {{old('kelurahan_id') ?? $warga->kelurahan_id == $kelurahan->id ? "selected" : ""}}>{{ $kelurahan->nama }}</option>
                            @endforeach
                        </select>
                        @error('kelurahan_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-maroon">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
