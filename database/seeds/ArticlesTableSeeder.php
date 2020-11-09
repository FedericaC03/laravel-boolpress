<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 
use App\Article;
use App\User;


class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for ($i=0; $i < 5; $i++) { 

            $users = User::all();

            foreach ($users as $user) {
                $newArticle = Article::where("user_id", $user->id)->get();
                $newArticle = New Article;
                $newArticle->user_id = $user->id;
                $newArticle->title = $faker->sentence(1, true);
                $newArticle->content = $faker->sentences(6, true);
                $newArticle->save();

        }
    }
  }
}
