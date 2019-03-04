<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            'thread_name' => 'Test thread (seed)',
            'content' => Str::random(35),
            'topic_starter' => '1',
        ]);
    }
}
