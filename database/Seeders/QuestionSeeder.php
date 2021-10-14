<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use \Illuminate\Database\Eloquent\Factory as factory;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param $factory
     * @return void
     */
    public function run()
    {


/*
        factory->define(\App\Models\Question::class, function (Faker $faker) {
            return  [
                'comment' => $faker->realText(rand(10, 300)),
            ];
        });*/




       /* \Illuminate\Support\Facades\DB::table('question')->insert([
            'title' => str_random(10),
            'description' => str_random(1000),
            'views' => rand([10],[10000]),
        ]);*/
    }
}
