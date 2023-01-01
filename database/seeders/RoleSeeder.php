<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $super_admin = Role::create([
            'name' => 'Super Administrator'
        ]);
        $super_admin->givePermissionTo([
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-permission',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'general-setting', //
            'tbtk-registration-list',
            'tbtk-registration-edit',
            'tbtk-registration-delete',
            'tbtk-registration-verification',
            'tbtk-selection-verification',
            'tbtk-approval-verification',
            'tbtk-aggrement-verification',
            'tbtk-payment-verification',
            'tbtk-uniform-verification',
            'tbtk-book-verification',
            'tbtk-registration-report',
            'tbtk-dapodik-list',
            'tbtk-dapodik-edit',
            'tbtk-dapodik-verification',
            'tbtk-dapodik-report',
            'sd-registration-list',
            'sd-registration-edit',
            'sd-registration-delete',
            'sd-registration-verification',
            'sd-selection-verification',
            'sd-approval-verification',
            'sd-aggrement-verification',
            'sd-payment-verification',
            'sd-uniform-verification',
            'sd-book-verification',
            'sd-registration-report',
            'sd-dapodik-list',
            'sd-dapodik-edit',
            'sd-dapodik-verification',
            'sd-dapodik-report',
            'smp-registration-list',
            'smp-registration-edit',
            'smp-registration-delete',
            'smp-registration-verification',
            'smp-selection-verification',
            'smp-approval-verification',
            'smp-aggrement-verification',
            'smp-payment-verification',
            'smp-uniform-verification',
            'smp-book-verification',
            'smp-registration-report',
            'smp-dapodik-list',
            'smp-dapodik-edit',
            'smp-dapodik-verification',
            'smp-dapodik-report'
        ]);

        $yayasan = Role::create([
            'name' => 'Yayasan'
        ]);
        $yayasan->givePermissionTo([
            'tbtk-registration-list',
            'tbtk-registration-verification',
            'tbtk-registration-report',
            'tbtk-dapodik-list',
            'tbtk-dapodik-report',
            'sd-registration-list',
            'sd-registration-verification',
            'sd-registration-report',
            'sd-dapodik-list',
            'sd-dapodik-report',
            'smp-registration-list',
            'smp-registration-verification',
            'smp-registration-report',
            'smp-dapodik-list',
            'smp-dapodik-report'
        ]);

        $admin_psb_tbtk = Role::create([
            'name' => 'Admin PSB TBTK'
        ]);
        $admin_psb_tbtk->givePermissionTo([
            'tbtk-registration-list',
            'tbtk-registration-edit',
            'tbtk-registration-delete',
            'tbtk-selection-verification',
            'tbtk-approval-verification',
            'tbtk-aggrement-verification',
            'tbtk-payment-verification',
            'tbtk-uniform-verification',
            'tbtk-book-verification',
            'tbtk-registration-report',
            'tbtk-dapodik-list',
            'tbtk-dapodik-edit',
            'tbtk-dapodik-verification',
            'tbtk-dapodik-report'
        ]);

        $admin_psb_sd = Role::create([
            'name' => 'Admin PSB SD'
        ]);
        $admin_psb_sd->givePermissionTo([
            'sd-registration-list',
            'sd-registration-edit',
            'sd-registration-delete',
            'sd-selection-verification',
            'sd-approval-verification',
            'sd-aggrement-verification',
            'sd-payment-verification',
            'sd-uniform-verification',
            'sd-book-verification',
            'sd-registration-report',
            'sd-dapodik-list',
            'sd-dapodik-edit',
            'sd-dapodik-verification',
            'sd-dapodik-report'
        ]);

        $admin_psb_smp = Role::create([
            'name' => 'Admin PSB SMP'
        ]);
        $admin_psb_smp->givePermissionTo([
            'smp-registration-list',
            'smp-registration-edit',
            'smp-registration-delete',
            'smp-selection-verification',
            'smp-approval-verification',
            'smp-aggrement-verification',
            'smp-payment-verification',
            'smp-uniform-verification',
            'smp-book-verification',
            'smp-registration-report',
            'smp-dapodik-list',
            'smp-dapodik-edit',
            'smp-dapodik-verification',
            'smp-dapodik-report'
        ]);

        $siswa_tbtk = Role::create([
            'name' => 'Siswa TBTK'
        ]);
        $siswa_tbtk->givePermissionTo([
            'tbtk-student-pendaftaran',
            'tbtk-student-siswa',
            'tbtk-student-administrasi',
            'tbtk-student-pembelajaran'
        ]);

        $siswa_sd = Role::create([
            'name' => 'Siswa SD'
        ]);
        $siswa_sd->givePermissionTo([
            'sd-student-pendaftaran',
            'sd-student-siswa',
            'sd-student-administrasi',
            'sd-student-pembelajaran'
        ]);

        $siswa_smp = Role::create([
            'name' => 'Siswa SMP'
        ]);
        $siswa_smp->givePermissionTo([
            'smp-student-pendaftaran',
            'smp-student-siswa',
            'smp-student-administrasi',
            'smp-student-pembelajaran'
        ]);
    }
}
