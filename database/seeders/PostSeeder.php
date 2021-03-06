<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Post::factory(6)->create();
    }
}
