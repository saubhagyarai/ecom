<?php

use App\Admin;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'super admin',
            'email' => 'admin@sunbi',
            'password' => bcrypt('password')
        ]);
    }
}
