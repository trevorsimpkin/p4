<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex() {
        //$climbs = \p4\Climb::orderBy('date_climbed','ascending')->paginate(3);
        if(\Auth::check()) {
            $user = \Auth::user();
            return view('welcome')->
            with(['user'=>$user,
            ]);
        }
        else {
            return view('welcome');
        }
    }

        

}
