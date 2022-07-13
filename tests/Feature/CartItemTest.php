<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('api/register', [
            'name' => 'sadra',
            'email' => 'sadra@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertJsonStructure();
        var_dump($response->json());

        $response->assertStatus(200);
    }
}
