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
        ]);

        DB::table('teams')->insert([
            'name' => 'team2',
        ]);
    }
}
