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
                <a href="{{route('petugas.pdf')}}" class="btn btn-md btn-primary mb-4" target="_blank"><i class="fas fa-file-download mr-3"></i>Export PDF</a>
                <a href="/admin/petugas/create" class="btn btn-md btn-success mb-4"><i class="fas fa-plus mr-3"></i>Tambah Data</a>
                <div class="card card-body bg-dark-200 text-white">
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" width="100%" id="petugas">
                            <thead>
                                <tr class="text-center">
                                    <th># No</th>
                                    <th>Nama Petugas</th>
                                    <th>username</th>
                                    <th>No Telepon</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_petugas as $petugas)
                                <tr class="text-center">
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$petugas->nama_petugas}}</td>
                                    <td>{{$petugas->username}}</td>
                                    <td>{{$petugas->telp}}</td>
                                    <td>
                                        @if ($petugas->level == "Admin")
                                        <span class="badge badge-danger">{{$petugas->level}}</span>
                                        @elseif ($petugas->level == "Petugas")
                                        <span class="badge badge-success">{{$petugas->level}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="{{route('admin.detailpengaduan',$petugas->id)}}" class="btn btn-md btn-warning"><i class="fas fa-clipboard mr-2"></i>Detail</a> --}}
                                        <a href="{{route('admin.destroypetugas',$petugas->id_petugas)}}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
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