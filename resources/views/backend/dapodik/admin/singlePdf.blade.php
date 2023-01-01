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
            width: 45%;
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
            max-height: 90%;
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
                <th>Data Pribadi</th>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>: {{ $dapodik_pribadi->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Nama Panggilan</th>
                <td>: {{ $dapodik_pribadi->nama_panggilan }}</td>
            </tr>
            <tr>
                <th>Tempat Tanggal Lahir</th>
                <td>: {{ $dapodik_pribadi->kota_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_pribadi->tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>: {{ $dapodik_pribadi->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td>: {{ $dapodik_pribadi->kewarganegaraan }}</td>
            </tr>
            @if ($dapodik_pribadi->kewarganegaraan == 'WNA')
                <tr>
                    <th>Nama Negara</th>
                    <td>: {{ $dapodik_pribadi->nama_negara }}</td>
                </tr>
            @endif
            <tr>
                <th>Agama</th>
                <td>: {{ $dapodik_pribadi->agama }}</td>
            </tr>
            @if ($dapodik_pribadi->agama == 'Katolik')
                <tr>
                    <th>Nama Paroki</th>
                    <td>: {{ $dapodik_pribadi->paroki }}</td>
                </tr>
            @endif
            <tr>
                <th>Berkebutuhan Khusus</th>
                <td>: {{ $dapodik_pribadi->kebutuhan_khusus }}</td>
            </tr>
            @if ($dapodik_pribadi->kebutuhan_khusus == 'Ya')
                <tr>
                    <th>Jenis Kebutuhan Khusus</th>
                    <td>: {{ $dapodik_pribadi->jenis_kebutuhan_khusus }}</td>
                </tr>
            @endif
            <tr>
                <th>Anak Ke-</th>
                <td>: {{ $dapodik_pribadi->anak_keberapa }}</td>
            </tr>
            <tr>
                <th>Saudara Kandung</th>
                <td>: {{ $dapodik_pribadi->saudara_kandung }}</td>
            </tr>
            <tr>
                <th>Golongan Darah</th>
                <td>: {{ $dapodik_pribadi->gol_darah }}</td>
            </tr>
            <tr>
                <th>Tinggi Badan</th>
                <td>: {{ $dapodik_pribadi->tinggi_badan }} cm</td>
            </tr>
            <tr>
                <th>Berat Badan</th>
                <td>: {{ $dapodik_pribadi->berat_badan }} kg</td>
            </tr>
            <tr>
                <th>Lingkar Kepala</th>
                <td>: {{ $dapodik_pribadi->lingkar_kepala }} cm</td>
            </tr>
            <tr>
                <th>Nomor Induk Siswa Nasional</th>
                <td>: {{ $dapodik_pribadi->nisn }}</td>
            </tr>
            <tr>
                <th>Asal Sekolah</th>
                <td>: {{ $dapodik_pribadi->asal_sekolah != null ? $dapodik_pribadi->asal_sekolah : 'Tidak Bersekolah' }}</td>
            </tr>
            @if ($dapodik_pribadi->asal_sekolah != null)
                <tr>
                    <th>Alamat Asal Sekolah</th>
                    <td>: {{ $dapodik_pribadi->asal_sekolah_alamat }}</td>
                </tr>
                <tr>
                    <th>Kota Asal Sekolah</th>
                    <td>: {{ $dapodik_pribadi->asal_sekolah_kota }}</td>
                </tr>
            @endif
        </table>
    </div>

    <div class="page-break"></div>

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
                <th>Data Kependudukan</th>
            </tr>
            <tr>
                <th>Nomor Induk Kependudukan</th>
                <td>: {{ $dapodik_kependudukan->nik }}</td>
            </tr>
            <tr>
                <th>Nomor Kartu Keluarga</th>
                <td>: {{ $dapodik_kependudukan->nkk }}</td>
            </tr>
            <tr>
                <th>Nomor Akte Kelahiran</th>
                <td>: {{ $dapodik_kependudukan->nak }}</td>
            </tr>
            <tr>
                <th>[KK] Alamat</th>
                <td>: {{ $dapodik_kependudukan->kk_alamat }}</td>
            </tr>
            <tr>
                <th>[KK] RT / RW</th>
                <td>: RT {{ $dapodik_kependudukan->kk_rt }} / RW {{ $dapodik_kependudukan->kk_rw }}</td>
            </tr>
            <tr>
                <th>[KK] Kelurahan</th>
                <td>: {{ $dapodik_kependudukan->kk_kelurahan }}</td>
            </tr>
            <tr>
                <th>[KK] Kecamatan</th>
                <td>: {{ $dapodik_kependudukan->kk_kecamatan }}</td>
            </tr>
            <tr>
                <th>[KK] Kota / Kabupaten</th>
                <td>: {{ $dapodik_kependudukan->kk_kota }}</td>
            </tr>
            <tr>
                <th>[KK] Kodepos</th>
                <td>: {{ $dapodik_kependudukan->kk_kodepos }}</td>
            </tr>
            <tr>
                <th>[Domisili] Alamat</th>
                <td>: {{ $dapodik_kependudukan->tt_alamat }}</td>
            </tr>
            <tr>
                <th>[Domisili] RT / RW</th>
                <td>: RT {{ $dapodik_kependudukan->tt_rt }} / RW {{ $dapodik_kependudukan->tt_rw }}</td>
            </tr>
            <tr>
                <th>[Domisili] Kelurahan</th>
                <td>: {{ $dapodik_kependudukan->tt_kelurahan }}</td>
            </tr>
            <tr>
                <th>[Domisili] Kecamatan</th>
                <td>: {{ $dapodik_kependudukan->tt_kecamatan }}</td>
            </tr>
            <tr>
                <th>[Domisili] Kota / Kabupaten</th>
                <td>: {{ $dapodik_kependudukan->tt_kota }}</td>
            </tr>
            <tr>
                <th>[Domisili] Kodepos</th>
                <td>: {{ $dapodik_kependudukan->tt_kodepos }}</td>
            </tr>
            <tr>
                <th>Tinggal Bersama</th>
                <td>: {{ $dapodik_kependudukan->tinggal_bersama }}</td>
            </tr>
            <tr>
                <th>Moda Transportasi</th>
                <td>: {{ $dapodik_kependudukan->transportasi }}</td>
            </tr>
            <tr>
                <th>Jarak Tempuh</th>
                <td>: {{ $dapodik_kependudukan->jarak_tempuh }} km</td>
            </tr>
            <tr>
                <th>Waktu Tempuh</th>
                <td>: {{ $dapodik_kependudukan->waktu_tempuh }} menit</td>
            </tr>
        </table>
    </div>

    <div class="page-break"></div>

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
        <table style="margin-bottom: 10px;">
            <tr>
                <th>Scan Kartu Keluarga</th>
            </tr>
        </table>
        <img src="{{ asset('upload/kartu_keluarga/' . $unit_slug . '/' . $dapodik_kependudukan->scan_kk) }}" alt="Kartu Keluarga">
    </div>

    <div class="page-break"></div>

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
        <table style="margin-bottom: 10px;">
            <tr>
                <th>Scan Akte Kelahiran</th>
            </tr>
        </table>
        <img src="{{ asset('upload/akte_kelahiran/' . $unit_slug . '/' . $dapodik_kependudukan->scan_ak) }}" alt="Akte Kelahiran">
    </div>

    <div class="page-break"></div>

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
        <table style="margin-bottom: 10px;">
            <tr>
                <th>Pas Foto</th>
            </tr>
        </table>
        <img src="{{ asset('upload/pas_foto/' . $unit_slug . '/' . $dapodik_kependudukan->pas_foto) }}" alt="Pas Foto">
    </div>

    <div class="page-break"></div>

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
        <div class="table-bottom">
            <table>
                <tr>
                    <th>Data Ayah</th>
                </tr>
                @if ($dapodik_ayah == null)
                    <tr>
                        <th>Data Ayah Tidak Ditemukan</th>
                    </tr>
                @else
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: {{ $dapodik_ayah->ayah_nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Induk Kependudukan</th>
                        <td>: {{ $dapodik_ayah->ayah_nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Tanggal Lahir</th>
                        <td>: {{ $dapodik_ayah->ayah_kota_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_ayah->ayah_tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>: {{ $dapodik_ayah->ayah_agama }}</td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>: {{ $dapodik_ayah->ayah_kewarganegaraan }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>: {{ $dapodik_ayah->ayah_pendidikan }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>: {{ $dapodik_ayah->ayah_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan Pekerjaan</th>
                        <td>: {{ $dapodik_ayah->ayah_jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Pendapatan Per Bulan</th>
                        <td>: @if ($dapodik_ayah->ayah_pendapatan == 'gol1')
                                Tidak Berpenghasilan
                            @elseif($dapodik_ayah->ayah_pendapatan == 'gol2')
                                Kurang dari Rp 2.000.000
                            @elseif($dapodik_ayah->ayah_pendapatan == 'gol3')
                                Rp 2.000.000 - 5.000.000
                            @elseif($dapodik_ayah->ayah_pendapatan == 'gol4')
                                Rp 5.000.000 - 10.000.000
                            @elseif($dapodik_ayah->ayah_pendapatan == 'gol5')
                                Lebih Dari Rp 10.000.000
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>: {{ $dapodik_ayah->ayah_nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Perusahaan</th>
                        <td>: {{ $dapodik_ayah->ayah_alamat_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Berkebutuhan Khusus</th>
                        <td>: {{ $dapodik_ayah->ayah_kebutuhan_khusus }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kebutuhan Khusus</th>
                        <td>: {{ $dapodik_ayah->ayah_jenis_kebutuhan_khusus }}</td>
                    </tr>
                    <tr>
                        <th>No. Handphone</th>
                        <td>: {{ $dapodik_ayah->ayah_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Email</th>
                        <td>: {{ $dapodik_ayah->ayah_email }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <div class="page-break"></div>

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
        <div class="table-bottom">
            <table>
                <tr>
                    <th>Data Ibu</th>
                </tr>
                @if ($dapodik_ibu == null)
                    <tr>
                        <th>Data Ibu Tidak Ditemukan</th>
                    </tr>
                @else
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: {{ $dapodik_ibu->ibu_nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Induk Kependudukan</th>
                        <td>: {{ $dapodik_ibu->ibu_nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Tanggal Lahir</th>
                        <td>: {{ $dapodik_ibu->ibu_kota_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_ibu->ibu_tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>: {{ $dapodik_ibu->ibu_agama }}</td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>: {{ $dapodik_ibu->ibu_kewarganegaraan }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>: {{ $dapodik_ibu->ibu_pendidikan }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>: {{ $dapodik_ibu->ibu_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan Pekerjaan</th>
                        <td>: {{ $dapodik_ibu->ibu_jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Pendapatan Per Bulan</th>
                        <td>: @if ($dapodik_ibu->ibu_pendapatan == 'gol1')
                                Tidak Berpenghasilan
                            @elseif($dapodik_ibu->ibu_pendapatan == 'gol2')
                                Kurang dari Rp 2.000.000
                            @elseif($dapodik_ibu->ibu_pendapatan == 'gol3')
                                Rp 2.000.000 - 5.000.000
                            @elseif($dapodik_ibu->ibu_pendapatan == 'gol4')
                                Rp 5.000.000 - 10.000.000
                            @elseif($dapodik_ibu->ibu_pendapatan == 'gol5')
                                Lebih Dari Rp 10.000.000
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>: {{ $dapodik_ibu->ibu_nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Perusahaan</th>
                        <td>: {{ $dapodik_ibu->ibu_alamat_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Berkebutuhan Khusus</th>
                        <td>: {{ $dapodik_ibu->ibu_kebutuhan_khusus }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kebutuhan Khusus</th>
                        <td>: {{ $dapodik_ibu->ibu_jenis_kebutuhan_khusus }}</td>
                    </tr>
                    <tr>
                        <th>No. Handphone</th>
                        <td>: {{ $dapodik_ibu->ibu_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Email</th>
                        <td>: {{ $dapodik_ibu->ibu_email }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <div class="page-break"></div>

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
        <div class="table-bottom">
            <table>
                <tr>
                    <th>Data Wali</th>
                </tr>
                @if ($dapodik_wali == null)
                    <tr>
                        <th>Data Wali Tidak Ditemukan</th>
                    </tr>
                @else
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: {{ $dapodik_wali->wali_nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Induk Kependudukan</th>
                        <td>: {{ $dapodik_wali->wali_nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Tanggal Lahir</th>
                        <td>: {{ $dapodik_wali->wali_kota_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_wali->wali_tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>: {{ $dapodik_wali->wali_agama }}</td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>: {{ $dapodik_wali->wali_kewarganegaraan }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>: {{ $dapodik_wali->wali_pendidikan }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>: {{ $dapodik_wali->wali_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan Pekerjaan</th>
                        <td>: {{ $dapodik_wali->wali_jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Pendapatan Per Bulan</th>
                        <td>: @if ($dapodik_wali->wali_pendapatan == 'gol1')
                                Tidak Berpenghasilan
                            @elseif($dapodik_wali->wali_pendapatan == 'gol2')
                                Kurang dari Rp 2.000.000
                            @elseif($dapodik_wali->wali_pendapatan == 'gol3')
                                Rp 2.000.000 - 5.000.000
                            @elseif($dapodik_wali->wali_pendapatan == 'gol4')
                                Rp 5.000.000 - 10.000.000
                            @elseif($dapodik_wali->wali_pendapatan == 'gol5')
                                Lebih Dari Rp 10.000.000
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>: {{ $dapodik_wali->wali_nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Perusahaan</th>
                        <td>: {{ $dapodik_wali->wali_alamat_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Berkebutuhan Khusus</th>
                        <td>: {{ $dapodik_wali->wali_kebutuhan_khusus }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kebutuhan Khusus</th>
                        <td>: {{ $dapodik_wali->wali_jenis_kebutuhan_khusus }}</td>
                    </tr>
                    <tr>
                        <th>No. Handphone</th>
                        <td>: {{ $dapodik_wali->wali_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Email</th>
                        <td>: {{ $dapodik_wali->wali_email }}</td>
                    </tr>
                    <tr>
                        <th>Hubungan Dengan Anak</th>
                        <td>: {{ $dapodik_wali->wali_hubungan_anak }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</body>

</html>
