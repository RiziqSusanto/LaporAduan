@extends('layouts.apppetugas')

@section('title', 'Tanggapi Pengaduan')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h1 class="text-white">Berikan Tanggapan</h1>
            <div class="card card-body bg-dark-400 text-white">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <a href="/petugas/pengaduan">
                            <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
                        </a>
                        <h1 class="h3">Tanggapi</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('petugas.tanggapi', $detail_tanggapan->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="tanggal_tanggapan" value="{{Carbon\Carbon::today()}}">
                            <input type="hidden" name="pengaduan_id" value="{{request()->route('id')}}">
                            <label for="tanggapan">Isi Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" class="form-control bg-dark-200" rows="15"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Submit Tanggapan</button>
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