<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        if (config('admin.admin_name')) {
            DB::table('users')->insert([
                'name' => config('admin.admin_name'),
                'email' => config('admin.admin_email'),
                'password' => bcrypt(config('admin.admin_password')),
                'role' => 'admin'
            ]);
        }
        DB::table('users')->insert([
            'name' => "user",
            'email' => "user@gmail.com",
            'password' => bcrypt("user123"),
            'role' => 'user'
        ]);
    }
}
