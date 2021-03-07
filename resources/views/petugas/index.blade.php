@extends('layouts.apppetugas')

@section('title', 'Dashboard Aplikasi Pengaduan Laporan')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-3 col-md-6 mt-5 mb-5">
            <div class="card bg-dark border-left-primary shadow h-100 py-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pengaduan</div>
                    <div class="h5 mb-0 font-weight-bold text-white">{{$pengaduan}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="far fa-file fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-5 mb-5">
            <div class="card bg-dark border-left-primary shadow h-100 py-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Masyarakat</div>
                    <div class="h5 mb-0 font-weight-bold text-white">{{$masyarakat}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-5 mb-5">
            <div class="card bg-dark border-left-primary shadow h-100 py-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengaduan Proses</div>
                    <div class="h5 mb-0 font-weight-bold text-white">{{$proses}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-check fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-5 mb-5">
            <div class="card bg-dark border-left-primary shadow h-100 py-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengaduan Selesai</div>
                    <div class="h5 mb-0 font-weight-bold text-white">{{$selesai}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6">
          <h1 class="text-center h3 text-white">Pengaduan</h1>
          <div class="card card-body bg-dark-400 text-white">
            <div class="table-responsive">
              <table class="table table-bordered text-white" width="100%" id="pengaduanJoin">
                  <thead>
                      <tr class="text-center">
                          <th># No</th>
                          <th>NIK Masyarakat</th>
                          <th>Nama Masyarakat/Pelapor</th>
                          <th>Tanggal Pengaduan</th>
                          <th>Isi Laporan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($vmasyarakatpengaduan as $view1)
                      <tr class="text-center">
                          <td scope="row">{{$loop->iteration}}</td>
                          <td>{{$view1->nik}}</td>
                          <td>{{$view1->nama}}</td>
                          <td>{{$view1->tanggal_pengaduan}}</td>
                          <td>{{$view1->isi_laporan}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h1 class="h3 text-center text-white">Log Status Pengaduan</h1>
          <div class="card card-body bg-dark-400 text-white">
            <div class="table-responsive">
              <table class="table table-bordered text-white" width="100%" id="logStatus">
                  <thead>
                      <tr class="text-center">
                          <th># No</th>
                          <th>ID Pengaduan</th>
                          <th>OLD Status</th>
                          <th>New Status</th>
                          <th>Tanggal Perubahan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($log_status as $logstatus)
                      <tr class="text-center">
                          <td scope="row">{{$loop->iteration}}</td>
                          <td>{{$logstatus->id_pengaduan}}</td>
                          <td>
                            @if ($logstatus->old_status == "Pending")
                              <span class="badge badge-danger">{{$logstatus->old_status}}</span>
                            @elseif ($logstatus->old_status == "Proses")
                              <span class="badge badge-warning">{{$logstatus->old_status}}</span>
                            @elseif ($logstatus->old_status == "Selesai")
                              <span class="badge badge-success">{{$logstatus->old_status}}</span>
                            @endif
                          </td>
                          <td>
                            @if ($logstatus->new_status == "Pending")
                              <span class="badge badge-danger">{{$logstatus->new_status}}</span>
                            @elseif ($logstatus->new_status == "Proses")
                              <span class="badge badge-warning">{{$logstatus->new_status}}</span>
                            @elseif ($logstatus->new_status == "Selesai")
                              <span class="badge badge-success">{{$logstatus->new_status}}</span>
                            @endif
                          </td>
                          <td>{{$logstatus->updated_at}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mt-4">
          <h1 class="h3 text-center text-white">Activity Log</h1>
          <div class="card card-body bg-dark-400 text-white">
            <div class="table-responsive">
              <table class="table table-bordered text-white" width="100%" id="activitylog">
                  <thead>
                      <tr class="text-center">
                          <th># No</th>
                          <th>Event Log</th>
                          <th>Nama Tabel</th>
                          <th>ID Referensi</th>
                          <th>Nama Petugas</th>
                          <th>Level</th>
                          <th>Waktu Aktivitas</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($activitylog as $log)
                      <tr class="text-center">
                          <td scope="row">{{$loop->iteration}}</td>
                          <td>{{$log->event_log}}</td>
                          <td>{{$log->table_name}}</td>
                          <td>{{$log->id_referensi}}</td>
                          <td>{{$log->nama_petugas}}</td>
                          <td>
                            @if ($log->level == "Admin")
                            <span class="badge badge-danger">{{$log->level}}</span>
                            @elseif ($log->level == "Petugas")
                            <span class="badge badge-success">{{$log->level}}</span>
                            @endif
                          </td>
                          {{-- <td>{{$log->level}}</td> --}}
                          <td>{{$log->updated_at}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection