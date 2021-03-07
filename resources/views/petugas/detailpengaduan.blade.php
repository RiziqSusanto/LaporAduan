@extends('layouts.apppetugas')

@section('title', 'Detail Data Pengaduan')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card card-body bg-dark-400 text-white">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <a href="/petugas/pengaduan">
                            <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
                        </a>
                        <h3>Status : {{$data_pengaduan->status}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{$data_pengaduan->tanggal_pengaduan}}</p>
                    <h5>{{$data_pengaduan->isi_laporan}}</h5>
                    <img src="/img/{{$data_pengaduan->foto}}" alt="Foto Bukti Pengaduan" class="img-fluid mx-auto d-block">
                    <hr>
                    <p class="font-weight-bold">Dilaporkan Oleh : {{$data_pengaduan->masyarakat->nama}}</p>
                    <p class="font-weight-bold">NIK : {{$data_pengaduan->masyarakat->nik}}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <form action="{{route('petugas.statusOnChange', $data_pengaduan->id)}}" method="post">
                            @csrf
                            <select name="status" class="form-control" onchange="javascript:this.form.submit()">
                                <option value="Pending" @if($data_pengaduan->status == "Pending") selected @endif>Pending</option>
                                <option value="Proses" @if($data_pengaduan->status == "Proses") selected @endif>Proses</option>
                                <option value="Selesai" @if($data_pengaduan->status == "Selesai") selected @endif>Selesai</option>
                            </select>
                        </form>
                        <a href="/petugas/pengaduan/{{$data_pengaduan->id}}/tanggapi" class="btn btn-primary">Tanggapi</a>
                    </div>
                </div>
            </div>

            <div class="card card-body shadow mt-3 mb-5 bg-dark-400 text-white">
                <div class="card-header">
                    <h4>Tanggapan</h4>
                </div>
                <div class="card-body">
                    {{@$data_tanggapan->tanggapan}}
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer bg-darker">
    <div class="container">
        <img src="{{asset('images/Logo.svg')}}" alt="Logo LaporAduan">
        <span class="text-white mx-auto ml-3">&copy; 2021 | Muhammad Riziq Susanto</span>
    </div>
</footer>
@endsection