<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="{{public_path('css/app.css')}}">
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
        .text-center {
            text-align: center !important;
        }
    </style>
</head>
<body class="bg-white">
    <h1 class="text-center">Data Per Tanggal : {{Carbon\Carbon::now()}}</h1>
        <table class="styled-table" width="100%">
            <thead>
                <tr class="text-center">
                    <th># No</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>No Telepon</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_petugas as $petugas)
                <tr class="text-center active.row">
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$petugas->nama_petugas}}</td>
                    <td>{{$petugas->username}}</td>
                    <td>{{$petugas->telp}}</td>
                    <td>{{$petugas->level}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>