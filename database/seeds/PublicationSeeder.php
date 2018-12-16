<?php

use App\Models\Publication;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(Publication::class, 20)->create();
        $ids = Publication::all()->pluck('id')->toArray();
        $names = ["storage/dummy/posts/post1.jpg", "storage/dummy/posts/post2.jpg", "storage/dummy/posts/post3.jpg", "storage/dummy/posts/post4.jpg", "storage/dummy/posts/post_violin.jpg", "storage/dummy/posts/sala.jpg"];

        foreach ($ids as $id) {
            $file_data = [
                'path' => $faker->randomElement($names),
                'description' => 'generic photo',
                'type' => 'PUBLICATION',
                'publication_id' => $id,
            ];
            \App\Models\File::create($file_data);
        }
    }
}

