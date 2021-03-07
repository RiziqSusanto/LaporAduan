@extends('layouts.applogin')

@section('title', 'Register Administrator')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-10 col-md-12 col-xl-8">
            <div class="card shadow">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('admin.register')}}" method="POST">
                            @csrf
                            <div class="w-100 mx-auto bg-success">
                                <h1 class="text-center text-white">Register Admin</h1>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Petugas</label>
                                <input type="text" name="nama_petugas" id="nama" class="form-control" placeholder="Masukan Nama...">
                                @error('nama_petugas')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username...">
                                @error('username')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password...">
                                @error('password')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telp">Telepon</label>
                                <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukan Telepon...">
                                @error('telp')
                                    <div class="alert alert-danger p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control" name="level" id="level">
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" type="submit">Buat Akun</button>
                            </div>
                            <div class="form-group">
                                <a href="/petugas/login" class="btn btn-secondary form-control" type="submit">Kembali Ke Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection