<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $super_admin = User::create([
            'token' => Str::random('20'),
            'name' => 'Super Administrator',
            'username' => 'super_admin',
            'password' => '$2y$10$8oplL9uaajW/u3XmzLwhLub9H7cmx4EXm2FzBEc1cyAMYXUSwgkQS',
        ]);
        $super_admin->assignRole('Super Administrator');

        $yayasan = User::create([
            'token' => Str::random('20'),
            'name' => 'Yayasan',
            'username' => 'yayasan',
            'password' => '$2y$10$xIWWYoF7iOFkKAYs65.9tOBXHSWtTYqaEgOalt2JNKZ6ylWKxK2bm', //prasama2022
        ]);
        $yayasan->assignRole('Yayasan');

        $admin_psb_tbtk = User::create([
            'token' => Str::random('20'),
            'name' => 'Admin PSB TBTK',
            'username' => 'admin_tbtk',
            'password' => '$2y$10$LoIc8YPMo7VyTO5SvlHFwOoZf9A5v84x9mKsFkiyHiePZ2eRUK38.', //adminpsb2022
        ]);
        $admin_psb_tbtk->assignRole('Admin PSB TBTK');

        $admin_psb_sd = User::create([
            'token' => Str::random('20'),
            'name' => 'Admin PSB SD',
            'username' => 'admin_sd',
            'password' => '$2y$10$LoIc8YPMo7VyTO5SvlHFwOoZf9A5v84x9mKsFkiyHiePZ2eRUK38.', //adminpsb2022
        ]);
        $admin_psb_sd->assignRole('Admin PSB SD');

        $admin_psb_smp = User::create([
            'token' => Str::random('20'),
            'name' => 'Admin PSB SMP',
            'username' => 'admin_smp',
            'password' => '$2y$10$LoIc8YPMo7VyTO5SvlHFwOoZf9A5v84x9mKsFkiyHiePZ2eRUK38.', //adminpsb2022
        ]);
        $admin_psb_smp->assignRole('Admin PSB SMP');
    }
}
