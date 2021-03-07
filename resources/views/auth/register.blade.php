@extends('layouts.applogin')

@section('title', 'Register Masyarakat')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-10 col-md-12 col-xl-8">
            <div class="card shadow  bg-dark-400">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('masyarakat.register')}}" method="POST">
                            @csrf
                            <div class="w-100 mx-auto bg-green">
                                <h1 class="text-center text-white">Pengaduan Laporan</h1>
                            </div>
                            <div class="form-group text-white">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan NIK...">
                                @error('nik')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-white">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama...">
                                @error('nama')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-white">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username...">
                                @error('username')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-white">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password...">
                                @error('password')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-white">
                                <label for="telp">Telepon</label>
                                <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukan Telepon...">
                                @error('telp')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" type="submit">Buat Akun</button>
                            </div>
                            <div class="form-group">
                                <a href="/login" class="btn btn-secondary form-control" type="submit">Kembali Ke Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection