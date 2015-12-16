<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

    public function getRemoveClimb($id = null) {
        $climb = \p4\Climb::find($id);
        $user = \Auth::user();
        $url = '/user/'.$user->id;
        $exists = $user->climbs->contains($id);
        if (!$exists) {
            \Session::flash('flash_message', 'You have not added this climb.');
            return redirect($url);
        }
        $user->climbs()->detach($climb);
        $url = '/user/'.$user->id;
        \Session::flash('flash_message','The climb was removed from your climbs');
        return redirect($url);
    }

}
