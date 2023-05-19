<?php

namespace Database\Seeders;

use App\Models\Gym;
use App\Models\Materiel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymMaterielTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $gymIds = Gym::pluck('id');
        $materielIds = Materiel::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('gym_materiel')->insert([
                'gym_id' => $gymIds->random(),
                'materiel_id' => $materielIds->random(),
                'quantity' => rand(1, 10),
            ]);
        }
    }
}
