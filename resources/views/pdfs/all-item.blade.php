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

        .header {
            margin-bottom: 50px;
            position: relative;
            height: 100px;
        }

        .header::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background: #000;
        }

        .header img {
            width: 100px;
            height: 100px;
            float: left;
            margin-right: 20px;
        }

        .header-content {
            float: left;

        }

        .header-text {
            margin: 0;
            font-size: 11px;
            font-weight: bold;
            line-height: 1.3;
        }

        .header-title {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
            padding: 0;
            line-height: .4;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
            /* padding-right: 50px; */
        }

        .signature p {
            margin: 3px 0;
        }

        .signature .name {
            margin-top: 50px;
            font-weight: bold;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* page-break-inside: avoid; */
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

        /* Atur lebar kolom spesissetik */
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
            width: 3%;
        }

        .col-status {
            width: 10%;
        }

        .col-jaksa {
            width: 15%;
        }
    </style>
</head>

<body>
    <div class="header clearfix">
        @if ($office?->logo)
            <img loading="lazy" src="storage/{{ $office?->logo }}" alt="Logo">
        @endif
        <div class="header-content">
            <span class="header-title">{!! $office?->kop_name !!}</span>
            <p class="header-text">{{ $office?->address }}</p>
            <p class="header-text">Email: {{ $office?->email }}</p>
        </div>
    </div>

    @php
        $fields = request()->array('fields');
        $signatureDateFromUrl = request()->date('signatureDate') ?? now();
        $categoryId = request()->integer("categoryId");
        $categoryData = \App\Models\Category::find($categoryId);

    @endphp
    <div style="text-align: center; line-height: .4; font-weight: bold; margin-bottom: 40px;">
        <p>FORMULIR BASAN DAN BARANG</p>
        <p>LAPORAN BULANAN PENERIMAAN DAN PENILAIAN BASAN DAN BARAN</p>
        <p>HASIL TINDAK PIDANA UMUM DAN TINDAK PIDANA KHUSUS</p>
        @if($categoryData)
            <p>TINGKAT {{ $categoryData->name }}</p>
        @endif
        <p>BULAN {{ strtoupper($signatureDateFromUrl->format("F Y")) }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                @if(in_array('tanggal_register', $fields))
                    <th class="col-date">Tgl Register</th>
                @endif
                @if(in_array('nomor_register', $fields))
                    <th class="col-register">No Register</th>
                @endif

                @if (in_array('jenis_tindak_pidana', $fields))
                    <th class="col-pidana">Jenis Pidana</th>
                @endif
                @if (in_array('jenis', $fields))
                    <th class="col-jenis">Jenis</th>
                @endif

                <th class="col-golongan">Golongan</th>
                @if (in_array('jumlah', $fields))
                    <th class="col-jumlah">Jumlah</th>
                @endif
                @if (in_array('gudang', $fields))
                    <th class="col-gudang">Gudang</th>
                @endif
                @if (in_array('tersangka', $fields))
                    <th class="col-tersangka">Tersangka</th>
                @endif
                @if (in_array('nilai_perkiraan_awal', $fields))
                    <th class="col-nilai">Nilai</th>
                @endif
                @if (in_array('kondisi_awal', $fields))
                    <th class="col-kondisi">Kondisi</th>
                @endif
                @if (in_array('status_tingkat_pemeriksaan', $fields))
                    <th class="col-status">Status</th>
                @endif
                @if (in_array('jaksa_penitip', $fields))
                    <th class="col-jaksa">Jaksa</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    @isset($item->tanggal_register)
                        <td>{{ $item->tanggal_register->format('d/m/Y') }}</td>
                    @endisset

                    @isset($item->nomor_register)
                        <td>{{ $item->nomor_register }}</td>
                    @endisset

                    @isset($item->jenis_tindak_pidana)
                        <td>{{ $item->jenis_tindak_pidana }}</td>
                    @endisset

                    @isset($item->jenis)
                        <td>{{ $item->jenis }}</td>
                    @endisset

                    @isset($item->category)
                        <td>{{ $item->category->name }}</td>
                    @endisset

                    @isset($item->jumlah)
                        <td>{{ $item->jumlah }}</td>
                    @endisset

                    @isset($item->gudang)
                        <td>{{ $item->gudang }}</td>
                    @endisset

                    @isset($item->tersangka)
                        <td>{{ $item->tersangka }}</td>
                    @endisset

                    @isset($item->nilai_perkiraan_awal)
                                <td>Rp{{ number_format(
                            $item->nilai_perkiraan_awal,
                            0,
                            ',',
                            '.'
                        ) }}</td>
                    @endisset
                    @isset($item->kondisi_awal)
                        <td>{{ $item->kondisi_awal }}</td>
                    @endisset

                    @isset($item->status_tingkat_pemeriksaan)
                        <td>{{ $item->status_tingkat_pemeriksaan }}</td>
                    @endisset

                    @isset($item->jaksa_penitip)
                        <td>{{ $item->jaksa_penitip }}</td>
                    @endisset
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($signatureDate)
        <div class="signature">
            <p>Jayapura, {{ $signatureDate->format('d / m / Y') }}</p>
            <p class="name">{{ $office?->leader_name }}</p>
            <p>NIP. {{ $office?->nip }}</p>
        </div>
    @endif
</body>

</html>
