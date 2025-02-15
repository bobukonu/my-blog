<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->delete();

        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('-1 year');

        for ($i=1; $i <=36; $i++) {
          $image = "Post_Image_" . rand(1, 5) . ".jpg";
          $date->addDays(10);
          $createdDate = clone($date);
          $publishedDate = clone($date);
          $category_id = rand(1, 5);

          $posts[] = [
            'author_id' => rand(1, 3),
            'title' => $faker->sentence(rand(8, 12)),
            'excerpt' => $faker->text(rand(250, 300)),
            'body' => $faker->paragraph(rand(10, 30), true),
            'slug' => $faker->slug(),
            'image' => rand(0, 1) == 1 ? $image : NULL,
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
            'published_at' => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL :$publishedDate->addDays(4) ),
            'category_id' => $category_id,
            'view_count' => rand(1, 10) * 10
          ];
        }


        DB::table('posts')->insert($posts);
    }
}
