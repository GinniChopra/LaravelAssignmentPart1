<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([

            'name' => 'Laravel',
            'slug' => 'laravel',

        ]);
        
        Tag::create([

            'name' => 'PHP',
            'slug' => 'php',

        ]);

        Tag::create([

            'name' => 'Docker',
            'slug' => 'docker',

        ]);
    }
}
