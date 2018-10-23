<?php

use App\Models\Publication;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
        $names = ["dummy/posts/post1.jpg", "dummy/posts/post2.jpg", "dummy/posts/post3.jpg", "dummy/posts/post4.jpg", "dummy/posts/post_violin.jpg", "dummy/posts/sala.jpg"] ;

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

