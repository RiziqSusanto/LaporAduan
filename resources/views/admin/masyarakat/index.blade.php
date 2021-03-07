@extends('layouts.appadmin')

@section('title', 'Data Masyarakat')

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
                <a href="{{route('admin.masyarakatpdf')}}" class="btn btn-md btn-primary mb-4" target="_blank"><i class="fas fa-file-download mr-3"></i>Export PDF</a>
                <a href="/admin/masyarakat/create" class="btn btn-md btn-success mb-4"><i class="fas fa-plus mr-3"></i>Tambah Data</a>
                <div class="card card-body bg-dark-200 text-white">
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" width="100%" id="masyarakat">
                            <thead>
                                <tr class="text-center">
                                    <th># No</th>
                                    <th>NIK Masyarakat</th>
                                    <th>Nama Masyarakat</th>
                                    <th>username</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_masyarakat as $masyarakat)
                                <tr class="text-center">
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$masyarakat->nik}}</td>
                                    <td>{{$masyarakat->nama}}</td>
                                    <td>{{$masyarakat->username}}</td>
                                    <td>{{$masyarakat->telp}}</td>
                                    <td>
                                        {{-- <a href="/admin/masyarakat/{{$masyarakat->nik}}/edit" class="btn btn-md btn-warning"><i class="fas fa-clipboard mr-2"></i>Edit</a> --}}
                                        <a href="{{route('admin.destroymasyarakat',$masyarakat->nik)}}" class="btn btn-md btn-danger"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
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