<?php

namespace Database\Factories;

use App\Models\BusSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusSeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusSeat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ref_id' => $this->faker->unique()->numberBetween(1, 12),
        ];
    }
}
