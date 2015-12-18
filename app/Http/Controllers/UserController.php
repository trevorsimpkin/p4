<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display profile page of user.
     *
     * @return user.index with user
     */
    public function getIndex($id=null) {
        $user = \Auth::user();
        if($user->id!=$id) {
            \Session::flash('flash_message','There was an error accessing this profile.');
            return redirect('/');
        }
        return view('user.index')->
        with(['user'=>$user,
        ]);
    }
    /**
     * Display edit profile view w
     *
     * @return user.edit with user
     */
    public function getEdit($id=null) {
        $user = \Auth::user();
        if ($user->id==$id) {
            return view('user.edit')
                ->with([
                    'user' => $user,
                ]);
        }
        else {
            \Session::flash('flash_message','There was an error accessing this page.');
            return redirect('/');
        }
    }
    /**
     * Stores edited fields and calls helper function
     * addPicture to store photo. If photo is not added
     * nothing is uploaded and profile photo stays the same
     *
     * @return redirect to user profile
     */
    public function postEdit(Request $request) {
        $this->validate(
            $request,
            [
                'profile'=>'image',
            ]
        );
        $user = \Auth::user();
        $user-> climbing_style = $request->climbing_style;
        $user->location = $request->location;
        $fileName = $user->profile;
        $fileName = \helpers::addPicture('profile', $fileName);
        $user->profile = $fileName;
        $user->save();
        $url = '/user/'.\Auth::id();
        \Session::flash('flash_message','Your profile was edited!');
        return redirect($url);
    }
    /**
     * Adds a climb to user's climbs.
     *
     * @return redirect to user profile
     */
    public function getAddClimb($id = null) {
        $climb = \p4\Climb::find($id);
        $user = \Auth::user();
        $url = '/user/'.$user->id;
        $exists = $user->climbs->contains($id);
        if ($exists) {

            \Session::flash('flash_message','You already have added this climb.');
            return redirect($url);
        }
        $user->climbs()->save($climb);
        \Session::flash('flash_message','Your climb was added!');
        return redirect($url);
    }
    /**
     * Removes a climb from user's climbs.
     *
     * @return redirect to user profile
     */
    public function getRemoveClimb($id = null) {
        $climb = \p4\Climb::find($id);
        $user = \Auth::user();
        $url = '/user/'.$user->id;
        $exists = $user->climbs->contains($id);
        if (!$exists) {
            \Session::flash('flash_message', 'You have not added this climb.');
            return redirect($url);
        }
        else if ($climb->administrator == $user->id) {
                \Session::flash('flash_message', 'Cannot Remove this climb. You are the administrator of this climb. You must pass administrator
                                privileges or delete climb.');
                return redirect($url);
        }
        $user->climbs()->detach($climb);
        $url = '/user/'.$user->id;
        \Session::flash('flash_message','The climb was removed from your climbs');
        return redirect($url);
    }

}
