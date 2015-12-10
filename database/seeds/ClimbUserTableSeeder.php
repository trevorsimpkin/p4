<?php

use Illuminate\Database\Seeder;

class ClimbUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        $users =[
            'Jill' => ['Blah Blah Climb','Crazy'],
            'Jamal' => ['Crazy']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($users as $username => $climbs) {

            # First get the book
            $user = \p4\User::where('username','LIKE',$username)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach($climbs as $climbName) {
                $climb = \p4\Climb::where('title','LIKE',$climbName)->first();

                # Connect this tag to this book
                $user->climbs()->save($climb);
            }

        }
    }
}
