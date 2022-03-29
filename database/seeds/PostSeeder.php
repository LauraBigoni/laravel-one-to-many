<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Pluck the category IDs and transform them into array format
        $category_ids = Category::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->sentence(4);
            $post->content = $faker->paragraphs(3, true);
            $post->image = $faker->imageUrl(360, 360);
            $post->is_published = 1;
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
