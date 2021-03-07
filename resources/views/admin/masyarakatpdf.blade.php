<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengaduan Masyarakat</title>
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
<body>
    <h1 class="text-center">Data Per Tanggal : {{Carbon\Carbon::now()}}</h1>
        <table class="styled-table" width="100%">
            <thead>
                <tr class="text-center">
                    <th># No</th>
                    <th>NIK Masyarakat</th>
                    <th>Nama Masyarakat</th>
                    <th>Username</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_masyarakat as $masyarakat)
                <tr class="text-center active.row">
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$masyarakat->nik}}</td>
                    <td>{{$masyarakat->nama}}</td>
                    <td>{{$masyarakat->username}}</td>
                    <td>{{$masyarakat->telp}}</td>  
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>