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
            'name' => 'Eldar',
            'email' => 'demfezeldar@gmail.com',
            'email_verified_at' => '2019-03-04 13:31:56',
            'location' => 'Ukraine',
            'bio' => 'Just a nice guy',
            'password' => bcrypt('q1w2e3r4'),
        ]);
    }
}
