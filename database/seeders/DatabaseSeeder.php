<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Factories\CategoryQuestionFactory;
use Database\Factories\QuestionFactory;
use Database\Factories\QuestionTagFactory;
use Database\Factories\AnswerFactory;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(100)->create();
        $this->call([
            BaseSeeder::class,
            CatSeeder::class,
            TagSeeder::class,
        ]);
//        Question::factory(50)->create();
//        for($i=1;$i<=50;$i++){
//            (new CategoryQuestionFactory())->create();
//        }
//        for($i=0;$i<50;$i++){
//            (new QuestionTagFactory())->create();
//        }
//        Answer::factory(50)->create();
    }
}
