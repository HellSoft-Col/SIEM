<?php

use App\Models\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publication::class, 20)->create();
        $ids = Publication::all()->pluck('id')->toArray();
        foreach ($ids as $id) {
            $file_data = [
                'path' => '/img/event_oboe_fagot.jpg',
                'description' => 'generic photo',
                'type' => 'PUBLICATION',
                'publication_id' => $id,
            ];
            \App\Models\File::create($file_data);
        }
    }
}
