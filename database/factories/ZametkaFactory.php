<?php

namespace Database\Factories;

use App\Models\Zametka;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZametkaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zametka::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => implode("",$this->faker->words(5)),
            'text' => $this->faker->text(100)
        ];
    }
}
