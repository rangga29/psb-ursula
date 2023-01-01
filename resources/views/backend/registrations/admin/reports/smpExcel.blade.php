<table>
    <thead>
        <tr>
            <th>No</th>
            {!! $registration_code == '1' ? '<th>Kode Pendaftaran</th>' : '' !!}
            {!! $virtual_code == '1' ? '<th>Kode Virtual</th>' : '' !!}
            {!! $registration_path == '1' ? '<th>Jalur Pendaftaran</th>' : '' !!}
            {!! $full_name == '1' ? '<th>Nama Lengkap</th>' : '' !!}
            {!! $nick_name == '1' ? '<th>Nama Panggilan</th>' : '' !!}
            {!! $birth_town == '1' ? '<th>Kota Kelahiran</th>' : '' !!}
            {!! $birth_date == '1' ? '<th>Tanggal Lahir</th>' : '' !!}
            {!! $origin_school == '1' ? '<th>Asal Sekolah</th>' : '' !!}
            {!! $gender == '1' ? '<th>Jenis Kelamin</th>' : '' !!}
            {!! $register_year == '1' ? '<th>Tahun Mendaftar</th>' : '' !!}
            {!! $register_grade == '1' ? '<th>Tingkat Dituju</th>' : '' !!}
            {!! $parent_name == '1' ? '<th>Nama Orangtua</th>' : '' !!}
            {!! $parent_phone == '1' ? '<th>No. Handphone</th>' : '' !!}
            {!! $parent_email == '1' ? '<th>Email</th>' : '' !!}
            {!! $registration_date == '1' ? '<th>Tanggal Pendaftaran</th>' : '' !!}
            {!! $kelas4_sem1_indo == '1' ? '<th>Kelas 4 B.Indo Sem 1</th>' : '' !!}
            {!! $kelas4_sem1_mat == '1' ? '<th>Kelas 4 Mat Sem 1</th>' : '' !!}
            {!! $kelas4_sem2_indo == '1' ? '<th>Kelas 4 B.Indo Sem 2</th>' : '' !!}
            {!! $kelas4_sem2_mat == '1' ? '<th>Kelas 4 Mat Sem 2</th>' : '' !!}
            {!! $kelas5_sem1_indo == '1' ? '<th>Kelas 5 B.Indo Sem 1</th>' : '' !!}
            {!! $kelas5_sem1_mat == '1' ? '<th>Kelas 5 Mat Sem 1</th>' : '' !!}
            {!! $kelas5_sem2_indo == '1' ? '<th>Kelas 5 B.Indo Sem 2</th>' : '' !!}
            {!! $kelas5_sem2_mat == '1' ? '<th>Kelas 5 Mat Sem 2</th>' : '' !!}
            {!! $registration_status == '1' ? '<th>Status Pendaftaran</th>' : '' !!}
            {!! $selection_status == '1' ? '<th>Status Wawancara</th>' : '' !!}
            {!! $approval_status == '1' ? '<th>Status Penerimaan</th>' : '' !!}
            {!! $dapodik_status == '1' ? '<th>Status Dapodik</th>' : '' !!}
            {!! $aggrement_status == '1' ? '<th>Status Surat Pernyataan</th>' : '' !!}
            {!! $payment_status == '1' ? '<th>Status Surat Keuangan</th>' : '' !!}
            {!! $uniform_status == '1' ? '<th>Status Seragam</th>' : '' !!}
            {!! $book_status == '1' ? '<th>Status Buku</th>' : '' !!}
        </tr>
    </thead>
    <tbody>
        @foreach ($registration_data as $registration)
            <tr>
                <td>{{ $loop->iteration }}</td>
                {!! $registration_code == '1' ? '<td>' . $registration->registration_code . '</td>' : '' !!}
                {!! $virtual_code == '1' ? '<td>' . $registration->virtual_code . '</td>' : '' !!}
                {!! $registration_path == '1' ? '<td>' . $registration->registration_path . '</td>' : '' !!}
                {!! $full_name == '1' ? '<td>' . $registration->full_name . '</td>' : '' !!}
                {!! $nick_name == '1' ? '<td>' . $registration->nick_name . '</td>' : '' !!}
                {!! $birth_town == '1' ? '<td>' . $registration->birth_town . '</td>' : '' !!}
                {!! $birth_date == '1' ? '<td>' . \Carbon\Carbon::createFromFormat('Y-m-d', $registration->birth_date)->isoFormat('DD MMMM Y') . '</td>' : '' !!}
                {!! $origin_school == '1' ? '<td>' . $registration->origin_school . '</td>' : '' !!}
                {!! $gender == '1' ? '<td>' . $registration->gender . '</td>' : '' !!}
                {!! $register_year == '1' ? '<td>TA ' . $registration->registration_year->name . '</td>' : '' !!}
                {!! $register_grade == '1' ? '<td> Kelas ' . $registration->register_grade . '</td>' : '' !!}
                {!! $parent_name == '1' ? '<td>' . $registration->parent_name . '</td>' : '' !!}
                {!! $parent_phone == '1' ? '<td>' . $registration->parent_phone . '</td>' : '' !!}
                {!! $parent_email == '1' ? '<td>' . $registration->parent_email . '</td>' : '' !!}
                {!! $registration_date == '1' ? '<td>' . \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $registration->created_at)->isoFormat('DD MMMM Y HH:mm') . '</td>' : '' !!}
                {!! $kelas4_sem1_indo == '1' ? '<td>' . $registration->kelas4_sem1_indo . '</td>' : '' !!}
                {!! $kelas4_sem1_mat == '1' ? '<td>' . $registration->kelas4_sem1_mat . '</td>' : '' !!}
                {!! $kelas4_sem2_indo == '1' ? '<td>' . $registration->kelas4_sem2_indo . '</td>' : '' !!}
                {!! $kelas4_sem2_mat == '1' ? '<td>' . $registration->kelas4_sem2_mat . '</td>' : '' !!}
                {!! $kelas5_sem1_indo == '1' ? '<td>' . $registration->kelas5_sem1_indo . '</td>' : '' !!}
                {!! $kelas5_sem1_mat == '1' ? '<td>' . $registration->kelas5_sem1_mat . '</td>' : '' !!}
                {!! $kelas5_sem2_indo == '1' ? '<td>' . $registration->kelas5_sem2_indo . '</td>' : '' !!}
                {!! $kelas5_sem2_mat == '1' ? '<td>' . $registration->kelas5_sem2_mat . '</td>' : '' !!}
                {!! $registration_status == '1' ? '<td>' . ($registration->registration_status == '1' ? 'Belum Terverifikasi' : 'Terverifikasi') . '</td>' : '' !!}
                {!! $selection_status == '1' ? '<td>' . ($registration->selection_status == '0' ? 'Belum Dilakukan' : 'Sudah Dilakukan') . '</td>' : '' !!}
                {!! $approval_status == '1' ? '<td>' . ($registration->approval_status == '0' ? 'Belum Pengumuman' : ($registration->approval_status == '1' ? 'Diterima' : 'Tidak Diterima')) . '</td>' : '' !!}
                {!! $dapodik_status == '1' ? '<td>' . ($registration->dapodik_status == '0' ? 'Belum Mengisi' : ($registration->dapodik_status == '1' ? 'Belum Terverifikasi' : 'Terverifikasi')) . '</td>' : '' !!}
                {!! $aggrement_status == '1' ? '<td>' . ($registration->aggrement_status == '0' ? 'Belum Mengisi' : 'Terverifikasi') . '</td>' : '' !!}
                {!! $payment_status == '1' ? '<td>' . ($registration->payment_status == '0' ? 'Belum Mengisi' : 'Terverifikasi') . '</td>' : '' !!}
                {!! $uniform_status == '1' ? '<td>' . ($registration->uniform_status == '0' ? 'Belum Ada Data' : 'Terverifikasi') . '</td>' : '' !!}
                {!! $book_status == '1' ? '<td>' . ($registration->book_status == '0' ? 'Belum Ada Data' : 'Terverifikasi') . '</td>' : '' !!}
            </tr>
        @endforeach
    </tbody>
</table>
