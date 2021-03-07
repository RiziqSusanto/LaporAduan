@extends('layouts.app')
@section('title', 'Detail Pengaduan Laporan Saya')
@section('content')
<div class="container">
    <h1 class="text-center mt-4 text-white">Detail Data Pengaduanku</h1>
    <div class="row mt-4">
        <div class="col-xl-12">
            <div class="card card-body bg-dark-200 mb-3">
                <div class="card-header text-white">
                    <div class="d-flex justify-content-between">
                        <a href="/data_pengaduan">
                            <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
                        </a>
                        <h4>Tanggapan</h4>
                    </div>
                </div>
                <div class="card-body text-white">
                    {{@$data_tanggapan->tanggapan}}
                </div>
            </div>
            <div class="card card-body bg-dark-200 mb-5">
                <div class="card-header text-white">
                    <div class="d-flex justify-content-center">
                        <h4 class="font-weight-bold bg-success p-1">
                            @if ($detail_pengaduan->status == "Proses")
                                <i class="fas fa-check"></i> Proses
                            @elseif ($detail_pengaduan->status == "Selesai")
                                <i class="fas fa-check-circle"></i> Selesai
                            @else
                                <i class="fas fa-spinner"></i> Pending
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="card-body text-white">
                    <p>{{$detail_pengaduan->tanggal_pengaduan}}</p>
                    <h5>{{$detail_pengaduan->isi_laporan}}</h5>
                    <img src="/img/{{$detail_pengaduan->foto}}" alt="Foto Bukti Pengaduan" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.footer')
@endsection