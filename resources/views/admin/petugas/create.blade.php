@extends('layouts.appadmin')

@section('title', 'Tambah Data Petugas')

@section('content')
<div class="container">
    <div class="row justify-content-center my-2">
        <div class="col-lg-6 mt-3">
            <h1 class="text-white text-center text-bold mb-3">Form Tambah Data Petugas</h1>
            <div class="card shadow-sm bg-dark-200 text-white">
                <div class="card-body">
                    <form action="{{route('admin.storepetugas')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nam_petugas">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control bg-dark-400" placeholder="Masukan Nama...">
                            @error('nama_petugas')
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
                            <label for="level">Level</label>
                            <select class="form-control bg-dark-400" name="level" id="level">
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary form-control" type="submit">Buat Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="sticky-footer bg-darker">
    <div class="container">
        <img src="{{asset('images/Logo.svg')}}" alt="Logo LaporAduan">
        <span class="text-white mx-auto ml-3">&copy; 2021 | Muhammad Riziq Susanto</span>
    </div>
  </footer>
@endsection