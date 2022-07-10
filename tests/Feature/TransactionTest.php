<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;

class TransactionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function customer_should_be_able_to_make_payment()
    {
        $sender = User::factory()
            ->has(
                Wallet::factory()
                    ->state(function (array $attributes) {
                        return ['balance' => '300'];
                    })
            )->create([
                'document' => $this->faker->cpf(false)
            ]);

        $receiver = User::factory()
            ->has(
                Wallet::factory()
                    ->state(function (array $attributes) {
                        return ['balance' => '100'];
                    })
            )->create();

        $response = $this->loginAs($sender)->post('/api/transactions', [
            'receiver_id' => $receiver->wallet->id,
            'description' => 'lorem ipsum',
            'amount' => '100'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'description' => 'lorem ipsum',
            'amount' => '100'
        ]);
    }

    /**
     * @test
     */
    public function customer_should_not_be_able_to_make_payment_with_insufficient_funds()
    {
        $sender = User::factory()
            ->has(
                Wallet::factory()
                    ->state(function (array $attributes) {
                        return ['balance' => '100'];
                    })
            )->create([
                'document' => $this->faker->cpf(false)
            ]);

        $receiver = User::factory()
            ->has(
                Wallet::factory()
                    ->state(function (array $attributes) {
                        return ['balance' => '100'];
                    })
            )->create();

        $response = $this->loginAs($sender)->post('/api/transactions', [
            'receiver_id' => $receiver->wallet->id,
            'description' => 'lorem ipsum',
            'amount' => '200'
        ]);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function seller_should_not_be_able_to_make_payment()
    {
        $seller = User::factory()->create([
            'document' => $this->faker->cnpj(false)
        ]);

        $response = $this->loginAs($seller)->post('/api/transactions');

        $response->assertStatus(403);
    }
}
