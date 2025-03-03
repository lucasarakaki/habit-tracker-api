<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Lista de hábitos
        $habits = [
            'Acordar cedo',
            'Beber água regularmente',
            'Praticar exercícios físicos',
            'Manter uma alimentação saudável',
            'Ler diariamente',
            'Meditar',
            'Dormir bem',
            'Organizar o dia',
            'Evitar procrastinação',
            'Cultivar gratidão',
            'Manter o ambiente limpo',
            'Aprender algo novo',
            'Estabelecer metas',
            'Evitar redes sociais em excesso',
            'Reservar tempo para lazer',
        ];

        return [
            'user_id' => User::factory(),
            'uuid'    => fake()->uuid(),
            'title'   => fake()->randomElement($habits),
        ];
    }
}
