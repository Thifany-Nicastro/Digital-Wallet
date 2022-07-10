<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;

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
            'balance' => $user->wallet->balance
        ]);
    }
}
