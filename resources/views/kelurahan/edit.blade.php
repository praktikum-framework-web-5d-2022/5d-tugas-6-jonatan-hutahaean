@extends('master')
@section('title','Pemerintah Kota Bekasi')
@section('menu','active')

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
                <h2>Edit Data Kelurahan</h2>
                <p>Masukkan data Kelurahan dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('kelurahan.update', ['kelurahan' => $kelurahan->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Kelurahan</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Kelurahan" class="form-control" value="{{old('nama') ?? $kelurahan->nama}}">
                        @error('nama')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="ketua_rw" class="form-label">Nama Ketua RW</label>
                        <input type="text" name="ketua_rw" id="ketua_rw" placeholder="Masukkan Nama Ketua RW" class="form-control" value="{{old('ketua_rw') ?? $kelurahan->ketua_rw}}">
                        @error('ketua_rw')
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
