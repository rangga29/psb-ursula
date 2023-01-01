<script>
    $(function() {
        'use strict'
        @if (session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: '<h2><strong>SUKSES</strong></h2>',
                html: '<h5 class="fw-bolder" style="color: black;">{{ session('success') }}</h5>',
                confirmButtonText: '<strong>TUTUP</strong>',
                timer: 5000,
                timerProgressBar: true
            })
        @endif
        @if (session()->has('warning'))
            Swal.fire({
                icon: 'warning',
                title: '<h2><strong>MOHON MAAF</strong></h2>',
                html: '<h5 class="fw-bolder" style="color: black;">{{ session('warning') }}</h5>',
                confirmButtonText: '<strong>TUTUP</strong>',
                timer: 5000,
                timerProgressBar: true
            })
        @endif
        @if (session()->has('error'))
            Swal.fire({
                icon: 'error',
                title: '<h2><strong>GAGAL</strong></h2>',
                html: '<h5 class="fw-bolder" style="color: black;">{{ session('error') }}</h5>',
                confirmButtonText: '<strong>TUTUP</strong>',
                timer: 5000,
                timerProgressBar: true
            })
        @endif

        $('form #button-submit').click(function(e) {
            let $form = $(this).closest('form');
            Swal.fire({
                icon: "question",
                title: '<h2><strong>KONFIRMASI DATA</strong></h2>',
                html: '<h5 class="fw-bolder" style="color: black;">Apakah Data Yang Dimasukkan Sudah Benar?</h5>',
                showCancelButton: true,
                confirmButtonText: '<strong>SUDAH BENAR</strong>',
                cancelButtonText: '<strong>CEK KEMBALI</strong>'
            }).then((result) => {
                if (result.value) {
                    $form.submit();
                }
            })
        });
        $('form #button-delete').click(function(e) {
            let $form = $(this).closest('form');
            Swal.fire({
                icon: "question",
                title: '<h2><strong>KONFIRMASI PENGAHAPUSAN</strong></h2>',
                html: '<h5 class="fw-bolder" style="color: black;">Apakah Yakin Ingin Menghapus Data Ini?</h5>',
                showCancelButton: true,
                confirmButtonText: '<strong>SUBMIT</strong>',
                cancelButtonText: '<strong>CANCEL</strong>'
            }).then((result) => {
                if (result.value) {
                    $form.submit();
                }
            })
        });
    });

    function editData(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        Swal.fire({
            icon: "question",
            title: '<h2><strong>KONFIRMASI PERUBAHAN</strong></h2>',
            html: '<h5 class="fw-bolder" style="color: black;">Apakah Yakin Ingin Mengubah Data Ini?</h5>',
            showCancelButton: true,
            confirmButtonText: '<strong>SUBMIT</strong>',
            cancelButtonText: '<strong>CANCEL</strong>'
        }).then((result) => {
            if (result.value) {
                window.location.href = urlToRedirect;
            }
        })
    }

    function verification(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        Swal.fire({
            icon: "question",
            title: '<h2><strong>KONFIRMASI PERUBAHAN</strong></h2>',
            html: '<h5 class="fw-bolder" style="color: black;">Apakah Yakin Ingin Mengubah Status Data Ini?</h5>',
            showCancelButton: true,
            confirmButtonText: '<strong>SUBMIT</strong>',
            cancelButtonText: '<strong>CANCEL</strong>'
        }).then((result) => {
            if (result.value) {
                window.location.href = urlToRedirect;
            }
        })
    }

    function restore(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        Swal.fire({
            icon: "question",
            title: '<h2><strong>KONFIRMASI PENGEMBALIAN</strong></h2>',
            html: '<h5 class="fw-bolder" style="color: black;">Apakah Yakin Ingin Mengembalikan Data Ini?</h5>',
            showCancelButton: true,
            confirmButtonText: '<strong>SUBMIT</strong>',
            cancelButtonText: '<strong>CANCEL</strong>'
        }).then((result) => {
            if (result.value) {
                window.location.href = urlToRedirect;
            }
        })
    }
</script>
