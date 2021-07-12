<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'team1',
            'manager_id'=> 2
        ]);

        DB::table('teams')->insert([
            'name' => 'team2',
            'manager_id'=> 5,
        ]);
    }
}
