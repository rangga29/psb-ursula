<script>
    $(function() {
        'use strict'
        @if(session() - > has('success'))
        Swal.fire({
            icon: 'success'
            , title: '<h2><strong>SUKSES</strong></h2>'
            , html: '<h4 class="fw-bolder" style="color: black;">{{ session('
            success ') }}</h4>'
            , confirmButtonText: '<strong>TUTUP</strong>'
            , timer: 5000
            , timerProgressBar: true
        })
        @endif
        @if(session() - > has('warning'))
        Swal.fire({
            icon: 'warning'
            , title: '<h2><strong>MOHON MAAF</strong></h2>'
            , html: '<h4 class="fw-bolder" style="color: black;">{{ session('
            warning ') }}</h4>'
            , confirmButtonText: '<strong>TUTUP</strong>'
            , timer: 5000
            , timerProgressBar: true
        })
        @endif
        @if(session() - > has('error'))
        Swal.fire({
            icon: 'error'
            , title: '<h2><strong>GAGAL</strong></h2>'
            , html: '<h4 class="fw-bolder" style="color: black;">{{ session('
            error ') }}</h4>'
            , confirmButtonText: '<strong>TUTUP</strong>'
            , timer: 5000
            , timerProgressBar: true
        })
        @endif

        $('form #button-submit').click(function(e) {
            let $form = $(this).closest('form');
            Swal.fire({
                icon: "question"
                , title: '<h2><strong>KONFIRMASI PENDAFTARAN</strong></h2>'
                , html: '<h4 class="fw-bolder" style="color: black;">Apakah Data Yang Dimasukkan Sudah Benar?</h4>'
                , showCancelButton: true
                , confirmButtonText: '<strong>SUDAH BENAR</strong>'
                , cancelButtonText: '<strong>CEK KEMBALI</strong>'
            }).then((result) => {
                if (result.value) {
                    $form.submit();
                }
            })
        });
    });

</script>
