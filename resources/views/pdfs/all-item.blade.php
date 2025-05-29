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
            font-family: Arial, sans-serisset;
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
    @php
        $fields = request()->array('fields');
    @endphp
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
</body>

</html>
