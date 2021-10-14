<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word(),
            'description'=>$this->faker->text,
           // 'user_id'=> $this->faker->numberBetween(1,10) , or
            'user_id'=> User::query()->inRandomOrder()->first()->id,

            'views' => $this->faker->randomNumber(),
            'score'=>$this->faker->randomNumber(),
            'status'=> $this->faker->word(),


        ];
    }
}
