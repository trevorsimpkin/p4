<?php

use Illuminate\Database\Seeder;

class ClimbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $climb = \p4\Climb::firstOrCreate(['title' => 'Blah Blah Climb']);
        $climb->difficulty = '5.14c';
        $climb->safety_rating = 'PG';
        $climb->date_climbed = '2015-12-25';
        $climb->description = 'Ten pitches of heaven.';
        $climb->location = 'Northwest';
        $climb->type = 'Trad';
        $climb->administrator = '1';
        $climb->mountain_project_link = 'https://www.mountainproject.com/v/high-exposure/105798994';
        $climb->save();

        $climb = \p4\Climb::firstOrCreate(['title' => 'Crazy']);
        $climb->difficulty = 'V9';
        $climb->safety_rating = 'NA';
        $climb->date_climbed = '2015-12-25';
        $climb->description = 'Best climb on the planet.';
        $climb->location = 'Southwest';
        $climb->type = 'Bouldering';
        $climb->administrator = '2';
        $climb->mountain_project_link = 'https://www.mountainproject.com/v/high-exposure/105798994';
        $climb->save();

    }
}
