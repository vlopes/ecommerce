<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function userCanRegister()
    {
        $response = $this->post('/register', [
            'first_name' => 'First',
            'last_name' => 'Last',
            'email' => 'test@test.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'token' => csrf_token(),
        ]);
            
        $response->assertStatus(200);
        
        $this->assertDatabaseHas('users', [
            'email' => 'test@test.com',
            'confirmed' => false,
        ]);
    }
}
