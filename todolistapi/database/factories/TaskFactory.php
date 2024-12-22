<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * O modelo correspondente à fábrica.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Defina o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'done' => $this->faker->boolean, 
        ];
    }

    /**
     *
     * @return static
     */
    public function done(): static
    {
        return $this->state([
            'done' => true,
        ]);
    }

    public function notDone(): static
    {
        return $this->state([
            'done' => false,
        ]);
    }
}
