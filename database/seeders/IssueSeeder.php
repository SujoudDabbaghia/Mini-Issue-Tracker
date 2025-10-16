<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use App\Models\Label;

class IssueSeeder extends Seeder
{
    public function run(): void
    {
        $projectAlpha = Project::first();
        $alice = User::where('email','alice@example.com')->first();
        $bob = User::where('email','bob@example.com')->first();
        $bugLabel = Label::where('name','Bug')->first();

        Issue::createWithRelations([
            'project_id' => $projectAlpha->id,
            'reporter_id' => $alice->id,
            'assignee_id' => $bob->id,
            'title' => 'Fix login bug',
            'code' => 'login-001',
            'status' => 'open',
            'priority' => 'high',
            'due_window' => ['start' => '2025-10-20', 'end' => '2025-10-25']
        ], 'Initial comment: needs urgent fix', [$bugLabel->id]);
    }
}
