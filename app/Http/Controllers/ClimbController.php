<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Http\Controllers\Controller;

class ClimbController extends Controller
{
    public function getIndex()
    {
        return view('Climb.index');
    }
    public function postIndex(Request $request)
    {

        //return view('Cat.postindex')->with (['image'=>$image, 'width'=>$width, 'height'=>$height] );
    }

}
