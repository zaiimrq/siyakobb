<!DOCTYPE html>
<html>

<head>
    <title>Items Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 1cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }


        .header h2 {
            margin: 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: avoid;
        }

        th,
        td {
            border: 0.5px solid #000;
            padding: 4px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 9px;
        }

        td {
            font-size: 9px;
        }

        tr {
            page-break-inside: avoid;
        }

        /* Atur lebar kolom spesifik */
        .col-no {
            width: 2%;
        }

        .col-date {
            width: 7%;
        }

        .col-register {
            width: 8%;
        }

        .col-pidana {
            width: 8%;
        }

        .col-jenis {
            width: 8%;
        }

        .col-golongan {
            width: 6%;
        }

        .col-jumlah {
            width: 5%;
        }

        .col-gudang {
            width: 6%;
        }

        .col-tersangka {
            width: 12%;
        }

        .col-nilai {
            width: 10%;
        }

        .col-kondisi {
            width: 8%;
        }

        .col-status {
            width: 10%;
        }

        .col-jaksa {
            width: 10%;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-date">Tgl Register</th>
                <th class="col-register">No Register</th>
                <th class="col-pidana">Jenis Pidana</th>
                <th class="col-jenis">Jenis</th>
                <th class="col-golongan">Golongan</th>
                <th class="col-jumlah">Jumlah</th>
                <th class="col-gudang">Gudang</th>
                <th class="col-tersangka">Tersangka</th>
                <th class="col-nilai">Nilai</th>
                <th class="col-kondisi">Kondisi</th>
                <th class="col-status">Status</th>
                <th class="col-jaksa">Jaksa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->tanggal_register->format('d/m/Y') }}</td>
                    <td>{{ $item->nomor_register }}</td>
                    <td>{{ $item->jenis_tindak_pidana }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->gudang }}</td>
                    <td>{{ $item->tersangka }}</td>
                    <td>Rp{{ number_format($item->nilai_perkiraan_awal, 0, ',', '.') }}</td>
                    <td>{{ $item->kondisi_awal }}</td>
                    <td>{{ $item->status_tingkat_pemeriksaan }}</td>
                    <td>{{ $item->jaksa_penitip }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
