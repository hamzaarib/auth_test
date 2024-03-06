<?php

namespace Database\Seeders;

use App\Models\Habitant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HabitantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Habitant::factory(2)->create();
        $habitants = Habitant::factory(10)->create();
        // Fetch existing ville_ids from the viles table
        $existingVilleIds = DB::table('villes')->pluck('id');
        // Update the created habitants with valid ville_ids
        $habitants->each(function ($habitant) use ($existingVilleIds) {
            $habitant->update([
                'ville_id' => $existingVilleIds->random(),
            ]);
        });
    }
}
