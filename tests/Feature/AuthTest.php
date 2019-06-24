<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
    }

    public function testEditThread()
    {
        $response = $this->get('/thread_1/edit');
        $response->assertStatus(302);
    }
}
