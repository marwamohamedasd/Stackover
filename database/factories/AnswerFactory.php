<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->text(),
            'score'=>$this->faker->randomNumber(),
            'accepted'=>$this->faker->numberBetween(0,1),
            'question_id'=>Question::query()->inRandomOrder()->first()->id,
            'user_id'=> User::query()->inRandomOrder()->first()->id
        ];
    }
}
