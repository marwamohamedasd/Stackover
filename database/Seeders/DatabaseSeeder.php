<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\questions_tags;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\questionstagsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



Question::factory()->count(2)->create();






      /* $this->call([\UserSeeder::class,


            ]);*/

      //User::factory(10)->create();
       // Tag::factory()->count(10)->create();
        // $this->call(\QuestionSeeder::class);
       // Answer::factory()->count(10)->create();
      //  Question::factory()->count(10)->create();




    }
}
