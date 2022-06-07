<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post2;
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
    //    # truncate() needed if database is refreshed at the start
    //    User::truncate();
    //    Post2::truncate();
    //    Category::truncate();

       $user = User::factory()->create([
          'name' => 'John Doe'
       ]);

       Post2::factory(5)->create([
           'user_id' => $user->id
       ]);

    // \App\Models\User::factory(10)->create();
       
    //    $user = User::factory()->create();

    //    $personal = Category::create(
    //    [
    //         'name' => 'Personal',
    //         'slug' => 'personal'
    //    ]);

    //    $family = Category::create(
    //    [
    //         'name' => 'Family',
    //         'slug' => 'family'
    //    ]);

    //    $work = Category::create(
    //    [
    //         'name' => 'Work',
    //         'slug' => 'work'
    //    ]);

    //    Post2::create([
    //     'user_id' => $user->id,
    //     'category_id' => $family->id,
    //     'title' => 'My Family Article',
    //     'slug' => 'my-first-post',
    //     'excerpt' => 'Lorem Ipsum Dolor Sit Amet.',
    //     'body' => 'Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet.'
    //    ]);
    //    Post2::create([
    //      'user_id' => $user->id,
    //      'category_id' => $work->id,
    //      'title' => 'My Work Article',
    //      'slug' => 'my-work-post',
    //      'excerpt' => 'Lorem ipsum dolor sit amet.',
    //      'body' => 'Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.'    
    //    ]);
    //    Post2::create([
    //      'user_id' => $user->id,
    //      'category_id' => $personal->id,
    //      'title' => 'My Personal Article',
    //      'slug' => 'my-personal-post',
    //      'excerpt' => 'Lorem ipsum dolor sit amet.',
    //      'body' => 'Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.'
    //    ]);
    }
}