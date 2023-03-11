<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Explicitly attach tags to projects
          $portfolioProject = Project::find(1);
          $portfolioProject->tags()->attach([1,2,3]);

            // Explicitly attach tags to projects
        $portfolioProject = Project::find(2);
        $portfolioProject->tags()->attach([3]);

          // Explicitly attach tags to projects
          $portfolioProject = Project::find(3);
          $portfolioProject->tags()->attach([2,3]);

            // Explicitly attach tags to projects
        $portfolioProject = Project::find(4);
        $portfolioProject->tags()->attach([1,2]);
    }
}
