<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal">LOGIN DASHBOARD</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="sign__input-wrapper mb-25">
                        <h5 class="text-uppercase">Kode Pendaftaran / Username</h5>
                        <div class="sign__input">
                            <input type="text" name="username" id="username" placeholder="Kode Pendaftaran / Username">
                            <i class="fal fa-user"></i>
                        </div>
                    </div>
                    <div class="sign__input-wrapper mb-10">
                        <h5 class="text-uppercase">Password</h5>
                        <div class="sign__input">
                            <input type="password" name="password" id="password" autocomplete="current-password" placeholder="Password">
                            <i class="fal fa-lock"></i>
                        </div>
                    </div>
                    <button class="e-btn w-100">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
