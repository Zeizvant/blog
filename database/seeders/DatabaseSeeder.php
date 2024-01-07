<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['id' => 1, 'email' => "admin@test.com", 'password' => bcrypt('admin')]);
        User::create(['id' => '2', 'email' => "test@test.com", 'password' => bcrypt('test')]);
        Quiz::factory()->create();
        Question::factory()->create();
        $answers = collect([
            'a' => 'Goalkeeper',
            'b' => 'Forward',
            'c' => 'Midfielder',
            'd' => 'Defender'
        ]);
        Question::create([
            'question' => 'What is Lionel Messi\'s preferred playing position?',
            'correct' => 'Forward',
            'position' => '2',
            'quiz_id' => 1,
            'answers' => $answers
        ]);

        $answers = collect([
            'a' => 'All of the above',
            'b' => 'Cristiano Ronaldo',
            'c' => 'Johan Cruyff',
            'd' => 'Michel Platini'
        ]);
        Question::create([
            'question' => 'Lionel Messi has won the Ballon d\'Or award, given to the world\'s best footballer, a record-breaking seven times. Which other players have won the award the most times?',
            'correct' => 'All of the above',
            'position' => '3',
            'quiz_id' => 1,
            'answers' => $answers
        ]);
    }
}
