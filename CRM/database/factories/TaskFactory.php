<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Generate fake data 
            'name' => $this->faker->name(),
            'assignee' => $this->faker->name(),
            'status' => $this->faker->status(),
            'dueDate' => $this->faker->dateTime()->format('d-m-Y H:i:s'),
        ];
    }
}
