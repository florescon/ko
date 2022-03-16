<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Color::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order = 1;   

        return [
            'name' => $this->faker->colorName,
            'short_name' => $order++.substr($this->faker->firstName, 0, 3),
            'color' => $this->faker->hexcolor,
        ];
    }
}
