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
        $climbs = \p4\Climb::orderBy('date_climbed','ascending')->paginate(3);
        return view('welcome')->
        with(['climbs'=>$climbs,
        ]);
    }

}
