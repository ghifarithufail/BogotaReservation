<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     /** @test */
    public function showLogin(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    
    /** @test */
    public function LoginProccess(): void
    {
 
        $user = User::where('id','1')->get();

        $response = $this->post('/login/auth', [
            'email' => 'ghifari@gmail.com',
            'password' => '12345689',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect('/reservation');
    }

    /** @test */
    public function LoginToTablePage(): void
    {
        $response = $this->post('/login/auth', [
            'email' => 'ghifari@gmail.com',
            'password' => '12345689',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/reservation');

        // Now, you can perform assertions after all logins are complete
        $response = $this->get('/table');
        $response->assertStatus(200);
        // Add more assertions as needed
    }

    /** @test */
    public function LoginAfterThatLogout(): void
    {

        $response = $this->post('/login/auth', [
            'email' => 'ghifari@gmail.com',
            'password' => '12345689',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect('/reservation');

        $response = $this->get('/logout');
    }
}
