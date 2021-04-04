@extends('layouts.app')
@section('title', 'Data Pengaduan Laporan Saya')
@section('content')
<div class="container">
    <h1 class="text-center mt-4 text-white ">List Data Pengaduanku</h1>
    <div class="row mt-4">
        <div class="col-xl-12">
            @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            <div class="alert alert-success alert-dismissible fade show">
                @foreach ($queries as $qry)
                <h4 class="alert-heading text-center">{{$qry}}</h4>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                @endforeach
              </div>
            @foreach ($data_pengaduan as $pengaduan)
            <a href="/data_pengaduan/detailpengaduan/{{$pengaduan->id}}" class="text-decoration-none text-dark">
                <div class="card mb-3 card-scale bg-dark-200">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between">
                            <p class="h3">{{$pengaduan->tanggal_pengaduan}}</p>
                            <p class="font-weight-bold bg-success p-1">
                                @if ($pengaduan->status == "Proses")
                                    <i class="fas fa-check"></i> Proses
                                @elseif ($pengaduan->status == "Selesai")
                                    <i class="fas fa-check-circle"></i> Selesai
                                @else
                                    <i class="fas fa-spinner"></i> Pending
                                @endif
                            </p>
                        </div>
                        <h5 class="card-text">{{$pengaduan->isi_laporan}}</h5>
                        {{-- <img src="/img/{{$pengaduan->foto}}" alt="Foto Bukti Laporan" class="img-fluid mx-auto d-block"> --}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@include('components.sticky-footer')
@endsection