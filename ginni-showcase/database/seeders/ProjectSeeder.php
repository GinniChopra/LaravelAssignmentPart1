<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  

    protected function fakeHTMLParagraphs($count = 3) {
        $bodyArray = fake()->paragraphs($count);
        $body = '<p>' . join('</p><p>', $bodyArray ) . '</p>';
        return $body;
    }

    public function run()
    {
        Project::create([
            'title' => 'Portfolio Showcase',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(4),
            'category_id' => 3,
            'slug' => Str::slug('Portfolio Showcase', '-')
        ]);
        Project::create([
            'title' => 'SSD Yearbook',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 1,
            'slug' => Str::slug('SSD Yearbook', '-')
        ]);
        Project::create([
            'title' => 'Movie Mania',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(5),
            'slug' => Str::slug('Movie Mania', '-')
        ]);
        Project::create([
            'title' => 'News Site Homepage',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2,
            'slug' => Str::slug('News Site Homepage', '-')
        ]);
        Project::create([
            'title' => 'JavaScript Game',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2,
            'slug' => Str::slug('JavaScript Game', '-')
        ]);
        Project::create([
            'title' => 'iOS App',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => Str::slug('iOS App', '-')
        ]);
        Project::create([
            'title' => 'Android App',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => Str::slug('Android App', '-')
        ]);
        Project::create([
            'title' => 'Industry Project',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(6),
            'category_id' => 3,
            'slug' => Str::slug('Industry Project', '-')
        ]);
    }



}
