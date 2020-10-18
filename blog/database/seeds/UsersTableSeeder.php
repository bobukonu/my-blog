<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the user table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        //generate 3 users
        $faker= Factory::create();
        DB::table('users')->insert([
          [
            'name' => "John Doe",
            'slug' => 'john-doe',
            'email' => "johndoe@email.com",
            'password' => bcrypt('secret'),
            'bio' => $faker->text(rand(250, 300))
          ],
          [
            'name' => "Bob Doe",
            'slug' => 'bob-doe',
            'email' => "bobdoe@email.com",
            'password' => bcrypt('secret'),
            'bio' => $faker->text(rand(250, 300))
          ],
          [
            'name' => "Jane Doe",
            'slug' => 'jane-doe',
            'email' => "janedoe@email.com",
            'password' => bcrypt('secret'),
            'bio' => $faker->text(rand(250, 300))
          ]
        ]);
    }
}
