<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    public function run(): void
    {
        Label::create(['name' => 'Bug', 'color' => '#FF0000']);
        Label::create(['name' => 'Feature', 'color' => '#00FF00']);
        Label::create(['name' => 'Documentation', 'color' => '#0000FF']);
    }
}
