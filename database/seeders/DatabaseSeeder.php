<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostDb;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // delete all records from the tables below
        User::truncate();
        Category::truncate();
        PostDb::truncate();

        // seeding post with factory
        PostDb::factory(20)->create();

        // seeding comments
        Comment::factory(5)->create();

        // manual factory
        //     // user factory
        //     $user =   User::factory()->create();


        //     $personal = Category::create([
        //         'name' => 'Personal',
        //         'slug' => 'personal'
        //     ]);

        //     $work = Category::create([
        //         'name' => 'Work',
        //         'slug' => 'work'
        //     ]);

        //     $hobbies = Category::create([
        //         'name' => 'Hobbies',
        //         'slug' => 'hobbies'
        //     ]);


        //     PostDb::create([
        //         'user_id' => $user->id,
        //         'category_id' => $personal->id,
        //         'title' => 'My First Post',
        //         'slug' => 'my-first-post',
        //         'excerpt' => 'lorem aklsdkl;asdkjajdfkljaskldaosfshbdfasf',
        //         'body' => '<p>asddddddddddddasd asfksdjfklajsdlkasdj jkashfkasdjaskldasd</p>'
        //     ]);
        //     PostDb::create([
        //         'user_id' => $user->id,
        //         'category_id' => $work->id,
        //         'title' => 'My second Post',
        //         'slug' => 'my-second-post',
        //         'excerpt' => 'lorem aklsdkl;asdkjajdfkljaskldaosfshbdfasf',
        //         'body' => '<p>asddddddddddddasd asfksdjfklajsdlkasdj jkashfkasdjaskldasd</p>'
        //     ]);
        //     PostDb::create([
        //         'user_id' => $user->id,
        //         'category_id' => $hobbies->id,
        //         'title' => 'My third Post',
        //         'slug' => 'my-third-post',
        //         'excerpt' => 'lorem aklsdkl;asdkjajdfkljaskldaosfshbdfasf',
        //         'body' => '<p>asddddddddddddasd asfksdjfklajsdlkasdj jkashfkasdjaskldasd</p>'
        //     ]);
        // }
    }
}
