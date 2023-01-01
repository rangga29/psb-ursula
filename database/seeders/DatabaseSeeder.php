<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(GeneralSeeder::class);
        $this->call(YearSeeder::class);

        $this->call(TbtkRegistrationUserSeeder::class);
        $this->call(TbtkRegistrationSeeder::class);
        $this->call(SdRegistrationUserSeeder::class);
        $this->call(SdRegistrationSeeder::class);
        $this->call(SmpRegistrationUserSeeder::class);
        $this->call(SmpRegistrationSeeder::class);
    }
}
