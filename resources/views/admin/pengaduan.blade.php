@extends('layouts.appadmin')

@section('title', 'Data Pengaduan')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{route('admin.pdf')}}" class="btn btn-md btn-primary mb-4" target="_blank"><i class="fas fa-file-download mr-3"></i>Export PDF</a>
                <div class="card card-body bg-dark-200 text-white">
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" width="100%" id="pengaduan">
                            <thead>
                                <tr class="text-center">
                                    <th># No</th>
                                    <th>NIK Masyarakat</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Nama Masyarakat/Pelapor</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengaduan as $pengaduan)
                                <tr class="text-center">
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$pengaduan->masyarakat->nik}}</td>
                                    <td>{{$pengaduan->tanggal_pengaduan}}</td>
                                    <td>{{$pengaduan->masyarakat->nama}}</td>
                                    <td>
                                        @if ($pengaduan->status == "Pending")
                                        <span class="badge badge-danger">{{$pengaduan->status}}</span>
                                        @elseif ($pengaduan->status == "Proses")
                                        <span class="badge badge-warning">{{$pengaduan->status}}</span>
                                        @elseif ($pengaduan->status == "Selesai")
                                        <span class="badge badge-success">{{$pengaduan->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.detailpengaduan',$pengaduan->id)}}" class="btn btn-md btn-warning"><i class="fas fa-clipboard mr-2"></i>Detail</a>
                                        <a href="{{route('admin.destroypengaduan',$pengaduan->id)}}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection