<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Sesi {{ $id_sesi }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        p div {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <div style="display: block; margin: 0 auto; text-align: center;">
        <img src="data:image/png;base64,{{ $logo }}" width="200" height="140">
    </div>
    <h1 style="text-align: center;">Buku Tamu Sesi {{ $id_sesi }}</h1>
    <h2 style="">Resepsi<br>{{ $undangan->nama_mempelai_pria }} dan {{ $undangan->nama_mempelai_wanita }}</h2>
    <p style="margin-bottom: 0"><span style="width: 100px;">Tanggal</span> : {{ $tanggal_resepsi }}</p>
    <p><span style="width: 100px;">Jam Resepsi</span> : {{ $jam_resepsi }}</p>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th width="20">No</th>
                <th style="text-align: center;">Nama Tamu</th>
                <th style="text-align: center;">Alamat</th>
                <th width="80">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $tamu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tamu->nama_tamu }}</td>
                <td>{{ $tamu->alamat }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>