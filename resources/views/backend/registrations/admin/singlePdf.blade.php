<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>

<body>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .header {
            border-bottom: 3px solid black;
        }

        .header center {
            margin-bottom: 14px;
        }

        .header center h1 {
            font-size: 12pt;
            margin-top: 0;
            margin-bottom: 0;
        }

        .header center h5 {
            font-size: 22pt;
            font-weight: bolder;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 0;
        }

        .header center h2 {
            font-size: 15pt;
            font-weight: bolder;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 0;
        }

        .table-top table {
            width: 100%;
            font-size: 14pt;
        }

        .table-top h5 {
            margin-top: 10px;
            margin-bottom: 16px;
        }

        .table-bottom table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-bottom th {
            width: 40%;
            text-transform: uppercase;
            font-size: 12pt;
            letter-spacing: 2%;
            border: 0px solid black;
            text-align: left;
        }

        .table-bottom table,
        .table-bottom td {
            font-size: 12pt;
            letter-spacing: 2%;
            border: 0px solid black;
        }

        .table-bottom th,
        .table-bottom td {
            padding: 10px;
        }

        .page-break {
            page-break-after: always;
        }

        .table-bottom img {
            max-width: 100%;
            max-height: 100%;
            object-fit: content;
        }
    </style>

    <div class="header">
        <center>
            <h1>PENERIMAAN SISWA BARU {{ $unit }} SANTA URSULA BANDUNG</h1>
            <h5>{{ $title }}</h5>
            <h2>NAMA : {{ $registration_data->full_name }}</h2>
        </center>
    </div>

    <div class="table-top">
        <table>
            <tr>
                <td align="left" style="width: 40%;">
                    <h5>Tanggal Unduh : {{ $todayDate }}</h5>
                </td>
            </tr>
        </table>
    </div>

    <div class="table-bottom">
        <table>
            <tr>
                <th>Kode Pendaftaran</th>
                <td>: {{ $registration_data->registration_code }}</td>
            </tr>
            <tr>
                <th>Kode Virtual</th>
                <td>: {{ $registration_data->virtual_code }}</td>
            </tr>
            @if ($unit != 'TBTK')
                <tr>
                    <th>Jalur Pendaftaran</th>
                    <td>: {{ $registration_data->registration_path }}</td>
                </tr>
            @endif
            <tr>
                <th>Nama Lengkap</th>
                <td>: {{ $registration_data->full_name }}</td>
            </tr>
            <tr>
                <th>Nama Panggilan</th>
                <td>: {{ $registration_data->nick_name }}</td>
            </tr>
            <tr>
                <th>Tempat Tanggal Lahir</th>
                <td>: {{ $registration_data->birth_town }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $registration_data->birth_date)->isoFormat('DD MMMM Y') }}</td>
            </tr>
            <tr>
                <th>Asal Sekolah</th>
                <td>: {{ $registration_data->origin_school }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>: {{ $registration_data->gender }}</td>
            </tr>
            <tr>
                <th>Tahun Mendaftar</th>
                <td>: Tahun Pelajaran {{ $registration_data->registration_year->name }}</td>
            </tr>
            @if ($unit == 'TBTK')
                <tr>
                    <th>Tingkat Dituju</th>
                    <td>: {{ $registration_data->register_grade != '0' ? ($registration_data->register_grade == '1' ? 'Kelas TK A' : 'Kelas TK B') : 'Kelas TB' }}</td>
                </tr>
            @else
                <tr>
                    <th>Tingkat Dituju</th>
                    <td>: Kelas {{ $registration_data->register_grade }}</td>
                </tr>
            @endif
            <tr>
                <th>Nama Orangtua</th>
                <td>: {{ $registration_data->parent_name }}</td>
            </tr>
            <tr>
                <th>No. Handphone</th>
                <td>: {{ $registration_data->parent_phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>: {{ $registration_data->parent_email }}</td>
            </tr>
            <tr>
                <th>Tanggal Pendaftaran</th>
                <td>: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $registration_data->created_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
            </tr>
            @if ($unit == 'SMP')
                <tr>
                    <th>[Kelas 4] B. Indonesia Sem 1</th>
                    <td>: {{ $registration_data->kelas4_sem1_indo }}</td>
                </tr>
                <tr>
                    <th>[Kelas 4] B. Indonesia Sem 2</th>
                    <td>: {{ $registration_data->kelas4_sem1_mat }}</td>
                </tr>
                <tr>
                    <th>[Kelas 4] Matematika Sem 1</th>
                    <td>: {{ $registration_data->kelas4_sem2_indo }}</td>
                </tr>
                <tr>
                    <th>[Kelas 4] Matematika Sem 2</th>
                    <td>: {{ $registration_data->kelas4_sem2_indo }}</td>
                </tr>
                <tr>
                    <th>[Kelas 5] B. Indonesia Sem 1</th>
                    <td>: {{ $registration_data->kelas5_sem1_indo }}</td>
                </tr>
                <tr>
                    <th>[Kelas 5] B. Indonesia Sem 2</th>
                    <td>: {{ $registration_data->kelas5_sem1_mat }}</td>
                </tr>
                <tr>
                    <th>[Kelas 5] Matematika Sem 1</th>
                    <td>: {{ $registration_data->kelas5_sem2_indo }}</td>
                </tr>
                <tr>
                    <th>[Kelas 5] Matematika Sem 2</th>
                    <td>: {{ $registration_data->kelas5_sem2_mat }}</td>
                </tr>
            @endif
        </table>
    </div>

    <div class="page-break"></div>

    <div class="table-bottom">
        <table style="margin-bottom: 10px;">
            <tr>
                <th>Bukti Pembayaran</th>
            </tr>
        </table>
        <img src="{{ asset('upload/payment_proof/' . $unit_slug . '/' . $registration_data->payment_proof) }}" alt="Bukti Pembayaran">
    </div>

    @if ($registration_data->covering_letter != null)
        <div class="page-break"></div>

        <div class="table-bottom">
            <table style="margin-bottom: 10px;">
                <tr>
                    <th>Surat Pengantar</th>
                </tr>
            </table>
            <img src="{{ asset('upload/covering_letter/' . $registration_data->covering_letter) }}" alt="Surat Pengantar">
        </div>
    @endif
</body>

</html>
