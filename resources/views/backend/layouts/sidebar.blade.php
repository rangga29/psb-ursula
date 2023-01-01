<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('home.index') }}" class="sidebar-brand">
            {{ $page_setting['unit'] }}<span>Ursula</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <li class="nav-item {{ active_class(['dashboard']) }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>

            @can('general-setting')
                <li class="nav-item nav-category">General Setting</li>
                <li class="nav-item {{ active_class(['dashboard/general-setting/main']) }}">
                    <a href="{{ route('dashboard.general.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Main Setting</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/general-setting/year']) }}">
                    <a href="{{ route('dashboard.general.year.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Year Setting</span>
                    </a>
                </li>
            @endcan

            @hasanyrole('Super Administrator|Yayasan|Admin PSB TBTK')
                <li class="nav-item nav-category">PSB TBTK Admin Management</li>
                <li class="nav-item {{ active_class(['dashboard/tbtk/admin/data-pendaftaran', 'dashboard/tbtk/admin/data-pendaftaran/*']) }}">
                    <a href="{{ route('dashboard.tbtk.admin.registration.index') }}"
                        class="nav-link {{ active_class(['dashboard/tbtk/admin/data-pendaftaran', 'dashboard/tbtk/admin/data-pendaftaran/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pendaftaran</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/tbtk/admin/data-dapodik', 'dashboard/tbtk/admin/data-dapodik/*']) }}">
                    <a href="{{ route('dashboard.tbtk.admin.dapodik.index') }}" class="nav-link {{ active_class(['dashboard/tbtk/admin/data-dapodik', 'dashboard/tbtk/admin/data-dapodik/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/tbtk/admin/data-administrasi', 'dashboard/tbtk/admin/data-administrasi/*']) }}">
                    <a href="{{ route('dashboard.tbtk.admin.administration.index') }}"
                        class="nav-link {{ active_class(['dashboard/tbtk/admin/data-administrasi', 'dashboard/tbtk/admin/data-administrasi/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Administrasi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/tbtk/admin/data-pembelajaran', 'dashboard/tbtk/admin/data-pembelajaran/*']) }}">
                    <a href="{{ route('dashboard.tbtk.admin.uniform-book.index') }}"
                        class="nav-link {{ active_class(['dashboard/tbtk/admin/data-pembelajaran', 'dashboard/tbtk/admin/data-pembelajaran/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pembelajaran</span>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('Super Administrator|Yayasan|Admin PSB SD')
                <li class="nav-item nav-category">PSB SD Admin Management</li>
                <li class="nav-item {{ active_class(['dashboard/sd/admin/data-pendaftaran', 'dashboard/sd/admin/data-pendaftaran/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sd-pendaftaran" role="button" aria-expanded="false" aria-controls="sd-pendaftaran">
                        <i class="link-icon" data-feather="layout"></i>
                        <span class="link-title">Data Pendaftaran</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div id="sd-pendaftaran"
                        class="collapse {{ show_class(['dashboard/sd/admin/data-pendaftaran', 'dashboard/sd/admin/data-pendaftaran/internal', 'dashboard/sd/admin/data-pendaftaran/external']) }}">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.sd.admin.registration.internal') }}"
                                    class="nav-link {{ active_class(['dashboard/sd/admin/data-pendaftaran/internal', 'dashboard/sd/admin/data-pendaftaran/internal/*']) }}">
                                    Jalur Internal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.sd.admin.registration.external') }}"
                                    class="nav-link {{ active_class(['dashboard/sd/admin/data-pendaftaran/external', 'dashboard/sd/admin/data-pendaftaran/external/*']) }}">
                                    Jalur External
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ active_class(['dashboard/sd/admin/data-dapodik', 'dashboard/sd/admin/data-dapodik/*']) }}">
                    <a href="{{ route('dashboard.sd.admin.dapodik.index') }}" class="nav-link {{ active_class(['dashboard/sd/admin/data-dapodik', 'dashboard/sd/admin/data-dapodik/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/sd/admin/data-administrasi', 'dashboard/sd/admin/data-administrasi/*']) }}">
                    <a href="{{ route('dashboard.sd.admin.administration.index') }}"
                        class="nav-link {{ active_class(['dashboard/sd/admin/data-administrasi', 'dashboard/sd/admin/data-administrasi/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Administrasi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/sd/admin/data-pembelajaran', 'dashboard/sd/admin/data-pembelajaran/*']) }}">
                    <a href="{{ route('dashboard.sd.admin.uniform-book.index') }}"
                        class="nav-link {{ active_class(['dashboard/sd/admin/data-pembelajaran', 'dashboard/sd/admin/data-pembelajaran/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pembelajaran</span>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('Super Administrator|Yayasan|Admin PSB SMP')
                <li class="nav-item nav-category">PSB SMP Admin Management</li>
                <li class="nav-item {{ active_class(['dashboard/smp/admin/data-pendaftaran', 'dashboard/smp/admin/data-pendaftaran/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#smp-pendaftaran" role="button" aria-expanded="false" aria-controls="smp-pendaftaran">
                        <i class="link-icon" data-feather="layout"></i>
                        <span class="link-title">Data Pendaftaran</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div id="smp-pendaftaran"
                        class="collapse {{ show_class(['dashboard/smp/admin/data-pendaftaran', 'dashboard/smp/admin/data-pendaftaran/internal', 'dashboard/smp/admin/data-pendaftaran/external']) }}">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.smp.admin.registration.internal') }}"
                                    class="nav-link {{ active_class(['dashboard/smp/admin/data-pendaftaran/internal', 'dashboard/smp/admin/data-pendaftaran/internal/*']) }}">
                                    Jalur Internal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.smp.admin.registration.external') }}"
                                    class="nav-link {{ active_class(['dashboard/smp/admin/data-pendaftaran/external', 'dashboard/smp/admin/data-pendaftaran/external/*']) }}">
                                    Jalur External
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ active_class(['dashboard/smp/admin/data-dapodik', 'dashboard/smp/admin/data-dapodik/*']) }}">
                    <a href="{{ route('dashboard.smp.admin.dapodik.index') }}" class="nav-link {{ active_class(['dashboard/smp/admin/data-dapodik', 'dashboard/smp/admin/data-dapodik/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/smp/admin/data-administrasi', 'dashboard/smp/admin/data-administrasi/*']) }}">
                    <a href="{{ route('dashboard.smp.admin.administration.index') }}"
                        class="nav-link {{ active_class(['dashboard/smp/admin/data-administrasi', 'dashboard/smp/admin/data-administrasi/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Administrasi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/smp/admin/data-pembelajaran', 'dashboard/smp/admin/data-pembelajaran/*']) }}">
                    <a href="{{ route('dashboard.smp.admin.uniform-book.index') }}"
                        class="nav-link {{ active_class(['dashboard/smp/admin/data-pembelajaran', 'dashboard/smp/admin/data-pembelajaran/*']) }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pembelajaran</span>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('Siswa TBTK')
                <li class="nav-item {{ active_class(['dashboard/tbtk/student/data-pendaftaran', 'dashboard/tbtk/student/data-pendaftaran/*']) }}">
                    <a href="{{ route('dashboard.tbtk.student.registration.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pendaftaran</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/tbtk/student/data-dapodik', 'dashboard/tbtk/student/data-dapodik/*']) }}">
                    <a href="{{ route('dashboard.tbtk.student.dapodik.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/tbtk/student/data-administrasi', 'dashboard/tbtk/student/data-administrasi/*']) }}">
                    <a href="{{ route('dashboard.tbtk.student.administration.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Administrasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" disabled="disabled">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pembelajaran</span>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('Siswa SD')
                <li class="nav-item {{ active_class(['dashboard/sd/student/data-pendaftaran', 'dashboard/sd/student/data-pendaftaran/*']) }}">
                    <a href="{{ route('dashboard.sd.student.registration.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pendaftaran</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/sd/student/data-dapodik', 'dashboard/sd/student/data-dapodik/*']) }}">
                    <a href="{{ route('dashboard.sd.student.dapodik.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/sd/student/data-administrasi', 'dashboard/sd/student/data-administrasi/*']) }}">
                    <a href="{{ route('dashboard.sd.student.administration.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Administrasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" disabled="disabled">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pembelajaran</span>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('Siswa SMP')
                <li class="nav-item {{ active_class(['dashboard/smp/student/data-pendaftaran', 'dashboard/smp/student/data-pendaftaran/*']) }}">
                    <a href="{{ route('dashboard.smp.student.registration.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pendaftaran</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/smp/student/data-dapodik', 'dashboard/smp/student/data-dapodik/*']) }}">
                    <a href="{{ route('dashboard.smp.student.dapodik.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['dashboard/smp/student/data-administrasi', 'dashboard/smp/student/data-administrasi/*']) }}">
                    <a href="{{ route('dashboard.smp.student.administration.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Administrasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" disabled="disabled">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Pembelajaran</span>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('Super Administrator|Administrator|Sub Administrator')
                <li class="nav-item nav-category">User Management</li>
                @can('user-list')
                    <li class="nav-item {{ active_class(['dashboard/users', 'dashboard/users/*']) }}">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Data User</span>
                        </a>
                    </li>
                @endcan
                @can('role-list')
                    <li class="nav-item {{ active_class(['dashboard/roles', 'dashboard/roles/*']) }}">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Data Role</span>
                        </a>
                    </li>
                @endcan
                @can('permission-list')
                    <li class="nav-item {{ active_class(['dashboard/permissions', 'dashboard/permissions/*']) }}">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Data Permissions</span>
                        </a>
                    </li>
                @endcan
            @endhasanyrole
        </ul>
    </div>
</nav>
