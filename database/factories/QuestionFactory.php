<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $answers = collect([
            'a' => 'Real Madrid',
            'b' => 'Manchester United',
            'c' => 'FC Barcelona',
            'd' => 'Chelsea'
        ]);
        return [
            'question' => 'Which club did Lionel Messi play for throughout his professional career before joining Paris Saint-Germain in 2021?',
            'correct' => 'FC Barcelona',
            'position' => '1',
            'quiz_id' => 1,
            'answers' => $answers
        ];
    }
}
