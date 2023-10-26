<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Transaksi</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.min.css') }}">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h4, h5 {
            text-align: center;
        }
        hr {
            border: 1px solid #333;
        }
        .col-6 {
            width: 50%;
            float: left;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        .text-center {
            text-align: center;
        }
        .mt-5 {
            margin-top: 5rem;
        }
        .mt-3 {
            margin-top: 3rem;
        }
        .col-4 {
            width: 33.33%;
            float: left;
        }
        .text-right {
            text-align: right;
        }
        .text-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h4>{{ config('app.name') }}</h4>
                <h5>Bukti Perjalanan Dinas</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p class="text-bold">No Transaksi: {{ $perjalanan->id }}</p>
            </div>
            <div class="col-6 text-right">
                <p>{{ date('d F Y', strtotime($perjalanan->created_at)) }}</p>
                <p>{{ $perjalanan->user->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Tanggal Pulang</th>
                            <th>Keterangan</th>
                            <th>Total Hari</th>
                            <th>Jarak Tempuh</th>
                            <th>Total Uang Perjalanan Dinas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $perjalanan->user ? $perjalanan->user->name : 'Nama Pegawai Tidak Ditemukan' }}</td>
                            <td>{{ $perjalanan->kotaasal }}</td>
                            <td>{{ $perjalanan->kotatujuan }}</td>
                            <td>{{ $perjalanan->tanggalberangkat }}</td>
                            <td>{{ $perjalanan->tanggalpulang }}</td>
                            <td>{{ $perjalanan->keterangan }}</td>
                            <td>{{ $perjalanan->durasi }} Hari</td>
                            <td>{{ $perjalanan->jarak }} KM</td>
                            <td>Rp. {{ $perjalanan->uangsaku }}</td>
                        </tr>
                        @php
                            $tot = $perjalanan->uangsaku;
                        @endphp
                        <tr>
                            <td colspan="6" class="text-center text-bold">Sub Total Harga</td>
                            <td>{{ 'Rp ' . number_format($tot, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <p>Sidoarjo, {{ date('d F Y') }}</p>
                <br>
                <br>
                <br>
                <p>{{ $perjalanan->admin->name }}</p>
            </div>
        </div>
    </div>
</body>
</html>
