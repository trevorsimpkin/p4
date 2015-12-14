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

}
