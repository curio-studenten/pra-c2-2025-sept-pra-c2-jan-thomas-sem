<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['ALCATEL Mobile Phones','Huawei', 'ZTE', 'Palm'];
        $brand_id = ['1', '2', '3', '4'];
        $counter = ['2','3','4','5','6','7'];
        return [
            'name' => fake()->randomElement($names),
            'brand_id' => fake()->randomElement($brand_id),
            'counter' => fake()->randomElement($counter)
        ];
    }
}
