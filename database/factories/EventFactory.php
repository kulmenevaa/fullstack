<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'place' => $this->faker->address(),
            'location' => $this->faker->title(),
            'image' => null,
            'status' => rand(0, 1),
            'date_start' => Carbon::yesterday()->toDateString(),
            'time_start' => Carbon::yesterday()->toTimeString(),
            'date_end' => Carbon::tomorrow()->toDateString(),
            'time_end' => Carbon::tomorrow()->toTimeString(),
            'participants' => rand(1, 50),
            'visibility' => rand(0, 1)
        ];
    }
}
