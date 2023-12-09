<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    /** @test */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function show_reservation(): void
    {
        $response = $this->get('/reservation');

        $response->assertStatus(200);
    }
}
