<?php

use Illuminate\Database\Seeder;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_user')->insert([
            'user_id' => 2,
            'team_id' => 1,
        ]);

        DB::table('team_user')->insert([
            'user_id' => 3,
            'team_id' => 1,
        ]);

        DB::table('team_user')->insert([
            'user_id' => 4,
            'team_id' => 1,
        ]);

        
        DB::table('team_user')->insert([
            'user_id' => 4,
            'team_id' => 2,
        ]);
    }
}
