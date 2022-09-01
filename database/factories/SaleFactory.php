<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'payme_sale_id' => $this->faker->unique()->domainWord(),
            'payme_sale_code' => $this->faker->unique()->domainWord(),
            'transaction_id' => $this->faker->unique()->domainWord(),
            'sale_payment_method' => $this->faker->randomElement(['credit-card', 'bit','cash']),
            'currency' => $this->faker->randomElement(['ILS','EUR','USD']),
            'status_code' => 0,
            'sale_url' => $this->faker->unique()->url(),
            'description' => $this->faker->name,
            'price' => $this->faker->randomDigit

        ];
    }
}
