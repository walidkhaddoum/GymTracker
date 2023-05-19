<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use App\Models\GroupSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueGroupSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $catalogueIds = Catalogue::pluck('id');
        $groupSessionIds = GroupSession::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('catalogue_group_session')->insert([
                'catalogue_id' => $catalogueIds->random(),
                'group_session_id' => $groupSessionIds->random(),
            ]);
        }
    }
}
