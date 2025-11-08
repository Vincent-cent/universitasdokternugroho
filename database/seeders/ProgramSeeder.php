<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Activity;
use App\Models\Collaborator;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $collaborators = Collaborator::factory(20)->create();

        Program::factory(20)->create()->each(function ($program) use ($collaborators) {
            $program->collaborators()->attach(
                $collaborators->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'role' => 'Sponsor',
                    'contribution_type' => 'cash',
                    'contribution_amount' => rand(1000000, 50000000),
                    'visibility' => 'public',
                ]
            );

            Activity::factory(rand(3, 8))->create([
                'program_id' => $program->id,
            ]);
        });
    }
}
