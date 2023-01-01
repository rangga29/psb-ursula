<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
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
            'file-manager',
            'general-setting',
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
            'tbtk-student-pendaftaran',
            'tbtk-student-siswa',
            'tbtk-student-administrasi',
            'tbtk-student-pembelajaran',
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
            'sd-student-pendaftaran',
            'sd-student-siswa',
            'sd-student-administrasi',
            'sd-student-pembelajaran',
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
            'smp-dapodik-report',
            'smp-student-pendaftaran',
            'smp-student-siswa',
            'smp-student-administrasi',
            'smp-student-pembelajaran',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
