@extends('layouts.app')
@section('title', 'Aplikasi Pengaduan Laporan')
@section('content')
<div class="container">
    <div class="row justify-content-center my-auto">
        <div class="col-lg-10 col-md-9 col-xl-10 mt-4">
            <h1 class="text-black text-center text-bold text-white">Silahkan Laporkan Permasalahan Anda!</h1>
            <div class="card shadow my-4 bg-dark-400 text-white">
                <div class="card-body">
                    <form action="{{route('masyarakat.pengaduan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="tanggal_pengaduan" value="{{Carbon\Carbon::today()}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="isi_laporan" class="text-black">Deskripsikan Laporan</label>
                            <textarea class="form-control bg-dark-600 text-white" id="isi_laporan" name="isi_laporan" rows="8" placeholder="Isi Laporanmu"></textarea>
                            @error('isi_laporan')
                                <div class="alert alert-danger p-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto" class="text-black">Bukti Foto</label>
                            <input type="file" class="form-control-file bg-gray-800" id="foto" name="foto">
                            <small>Maksimal Ukuran Foto 2MB</small>
                            @error('foto')
                                <div class="alert alert-danger p-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control bg-green">Submit Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection