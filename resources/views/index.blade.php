@extends('layouts.app')

@section('title', 'Aplikasi Pengaduan Masyarakat')

@section('content')
{{-- <div class="jumbotron jumbotron-fluid mh-100">
    <div class="card card-body border-0">
        <div class="text-center">
            <h1 class="text-uppercase font-weight-bold">LaporAduan</h1>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <div class="bg-dark-400 jumbotron vh-90 text-center m-0 d-flex flex-column justify-content-center">
                <h1 class="display-4 text-white">LaporAduan</h1>
                <p class="lead text-white">LaporAduan adalah aplikasi pengaduan laporan masyarakat berbasis web</p>
                <p class="lead">
                    <a class="btn btn-green btn-lg" href="/pengaduan" role="button">Buat Laporan</a>
                </p>
            </div>
        </div>
    </div>
</div>
@include('components.sticky-footer')
@endsection