<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MeanAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // mean admin
        User::create([
            'name' => 'super admin',
            'phone' => '01063981560',
            'type' => 'super_admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(10203040),
        ]);
    }
}
