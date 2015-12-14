<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = \p4\User::firstOrCreate(['email' => 'jill@harvard.edu']);
        $user->username = 'Jill';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->climbing_style = 'Bouldering';
        $user->location = 'NorthWest';
        $user->profile = '';
            $user->save();

        $user = \p4\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
        $user->username = 'Jamal';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->climbing_style = 'Trad';
        $user->location = 'NorthEast';
        $user->profile = '';
            $user->save();

    }
}
