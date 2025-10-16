<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'name' => 'Project Alpha',
            'description' => 'First test project'
        ]);

        Project::create([
            'name' => 'Project Beta',
            'description' => 'Second test project'
        ]);
    }
}
