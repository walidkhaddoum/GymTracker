<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        $this->call(GymsTableSeeder::class);
        $this->call(SpacesTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(TrainersTableSeeder::class);
        $this->call(GymSpaceTableSeeder::class);
        $this->call(SpecializationTrainerTableSeeder::class);
        $this->call(AttendancesTableSeeder::class);
        $this->call(GymMembershipsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(SubscriptionsTableSeeder::class);
        $this->call([
            GroupSessionSeeder::class,
            SessionAssignmentSeeder::class,
        ]);
    }
}
