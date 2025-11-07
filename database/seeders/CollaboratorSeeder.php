<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Activity;
use App\Models\Collaborator;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
    {
        // create programs
        $programs = Program::factory()->count(5)->create();

        // create collaborators
        $collaborators = Collaborator::factory()->count(12)->create();

        // for each program create 2-4 activities
        foreach ($programs as $program) {
            $activities = Activity::factory()->count(rand(2,4))->make();
            $program->activities()->saveMany($activities);

            // attach 1-4 program-level collaborators
            $progCollabs = $collaborators->random(rand(1,4));
            foreach ($progCollabs as $collab) {
                $program->collaborators()->attach($collab->id, [
                    'role' => rand(0,1) ? 'Lead Sponsor' : 'Supporter',
                    'contribution_type' => $this->randomContributionType(),
                    'contribution_amount' => rand(500000, 50000000),
                    'contribution_percentage' => null,
                    'is_primary' => rand(0,4) === 0, // some random primary flags
                    'impact_note' => 'Long-term support for the program',
                    'visibility' => rand(0,6) ? 'public' : 'anonymous_public'
                ]);
            }

            // attach 1-5 activity-level collaborators for each activity
            foreach ($program->activities as $activity) {
                $activityCollabs = $collaborators->random(rand(1,5));
                foreach ($activityCollabs as $collab) {
                    $activity->collaborators()->attach($collab->id, [
                        'role' => $this->fakerRole(),
                        'contribution_type' => $this->randomContributionType(),
                        'contribution_amount' => rand(100000, 20000000),
                        'contribution_percentage' => null,
                        'is_primary' => false,
                        'impact_note' => 'Supported the activity execution',
                        'visibility' => rand(0,8) ? 'public' : 'anonymous_public'
                    ]);
                }
            }
        }
    }
        private function randomContributionType()
    {
        return collect(['cash','in-kind','service'])->random();
    }

    private function fakerRole()
    {
        return collect(['Lead Sponsor','Co-Sponsor','Media Partner','In-Kind Partner'])->random();
    }
}
