<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="{{public_path('css/app.css')}}">
    <style>
    </style>
</head>
<body class="bg-white">
    <h1 class="text-center">Data Per Tanggal : {{Carbon\Carbon::now()}}</h1>
    <table width="100%">
        <tr>
            <td>Tanggal Pengaduan : <strong>{{$data_pengaduan->tanggal_pengaduan}}</td>
            <td style="text-align: right">Oleh : <strong>{{$data_pengaduan->masyarakat->nik}} - {{$data_pengaduan->masyarakat->nama}}</strong></td>
        </tr>
    </table>
    <h1 class="text-center">Laporan</h1>
    <div class="card-body">
        <h4 class="text-center">{{$data_pengaduan->isi_laporan}}</h4>
    </div>
    <div class="card-body">
        <h1 class="text-center">Tanggapan</h1>
        <h4 class="text-center">{{$data_tanggapan->tanggapan}}</h4>
    </div>
    <hr>
    <img src="{{public_path('img').'/'.$data_pengaduan->foto}}" alt="Foto Bukti" class="img-fluid mx-auto">
</body>
</html>