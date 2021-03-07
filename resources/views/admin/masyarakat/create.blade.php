@extends('layouts.appadmin')

@section('title', 'Form Tambah Data Masyarakat')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-10 col-md-12 col-xl-8">
            <h1 class="text-white text-center text-bold mb-3">Form Tambah Data Masyarakat</h1>
            <div class="card shadow bg-dark-200 text-white">
                    <div class="card-body">
                        <form action="{{route('admin.storemasyarakat')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control bg-dark-400" placeholder="Masukan NIK...">
                                @error('nik')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control bg-dark-400" placeholder="Masukan Nama...">
                                @error('nama')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control bg-dark-400" placeholder="Masukan Username...">
                                @error('username')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control bg-dark-400" placeholder="Masukan Password...">
                                @error('password')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telp">Telepon</label>
                                <input type="number" name="telp" id="telp" class="form-control bg-dark-400" placeholder="Masukan Telepon...">
                                @error('telp')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" type="submit">Tambah Data Masyarakat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection