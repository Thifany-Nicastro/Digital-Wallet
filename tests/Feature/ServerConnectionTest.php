<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServerConnectionTest extends TestCase
{
    /**
     * @test
     */
    public function application_connected_successfully()
    {
        $response = $this->get('api/ping');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Pong!'
        ]);
    }
}
