<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\questions_tags;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class questions_tagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = questions_tags::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id'=>Question::query()->inRandomOrder()->first()->id,
            'tag_id'=>Tag::query()->inRandomOrder()->first()->id
        ];
    }
}
