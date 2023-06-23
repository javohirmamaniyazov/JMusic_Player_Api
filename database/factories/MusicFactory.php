<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Music;

class MusicFactory extends Factory
{
    protected $model = Music::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'author' => $this->faker->name,
            'created_year' => $this->faker->numberBetween(1950, 2023),
            'music_time' => $this->faker->time(),
        ];
    }
}
