<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'demfezeldar@gmail.com',
            'email_verified_at' => '2019-03-04 13:31:56',
            'password' => bcrypt('q1w2e3r4'),
        ]);
    }
}
