<?php

namespace Tests\Feature;

use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_should_be_able_to_access_profile()
    {
        $user = (Wallet::factory()->create())->user;

        $response = $this->loginAs($user)->get('/api/profile');

        $response->assertStatus(200);
        $response->assertJson([
            'email' => $user->email,
            'balance' => $user->wallet->balance,
        ]);
    }

    /**
     * @test
     */
    public function user_should_not_be_able_to_access_profile_when_unauthenticated()
    {
        $response = $this->get('/api/profile');

        $response->assertStatus(401);
    }
}
