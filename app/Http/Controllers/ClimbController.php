<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Http\Controllers\Controller;

class ClimbController extends Controller
{

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    public function getIndex(Request $request) {
        $sort = $request->input('sort','date_climbed');
        $climbs = \p4\Climb::orderBy($sort,'ascending')->paginate(3);

        return view('climbs.index')
            ->with([
                'climbs'=>$climbs,
        ]);
    }
    public function getEdit($id = null) {
        $climb = \p4\Climb::find($id);
        if(is_null($climb)) {
            \Session::flash('flash_message','Climb not found.');
            return redirect('/');
        }
        if($climb->administrator != \Auth::id()) {
            \Session::flash('flash_message','You are not the administrator of this climb.');
            return redirect('/');
        }
        return view('climbs.edit')
            ->with([
                'climb' => $climb,
            ]);
    }
    public function postEdit(Request $request) {
        $climb = \p4\Climb::find($request->id);
        $climb->title = $request->title;
        $climb->difficulty = $request->difficulty;
        $climb->location = $request->location;
        $climb->type = $request->type;
        $climb->description = $request->description;
        $climb->mountain_project_link = $request->mountain_project_link;
        $climb->pic = $request->pic;
        $climb->save();
        $url = '/user/'.\Auth::id();
        \Session::flash('flash_message','Your climb was edited!');
        return redirect($url);
    }
    public function getCreate() {
        return view('climbs.create');
    }
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'difficulty' => 'required',
            ]
        );
        $climb = new \p4\Climb();
        $climb->title = $request->title;
        $climb->difficulty = $request->difficulty;
        $climb->administrator = \Auth::id(); # <--- NEW LINE
        $climb->location = $request->location;
        $climb->safety_rating = $request->safety_rating;
        $climb->date_climbed = $request->date_climbed;
        $climb->type = $request->type;
        $climb->description = $request->description;
        $climb->mountain_project_link = $request->mountain_project_link;
        $climb->pic = $request->pic;
        $climb->save();
        $user = \Auth::user();
        $user->climbs()->save($climb);
        \Session::flash('flash_message','Your climb was added!');
        return redirect('/');
    }
    public function getConfirmDelete($climb_id) {
        $climb = \p4\Climb::find($climb_id);
        if($climb->administrator != \Auth::id()) {
            \Session::flash('flash_message','You are not the administrator of this climb.');
            return redirect('/');
        }
        return view('climbs.delete')-> with('climb', $climb);
    }

    /**
     *
     */
    public function getDoDelete($climb_id) {
        $climb = \p4\Climb::find($climb_id);
        if (is_null($climb)) {
            \Session::flash('flash_message', 'Climb not found.');
            return redirect('\climbs');
        }
        if ($climb->users()) {
            $climb->users()->detach();
        }
        $climb->delete();
        \Session::flash('flash_message', $climb->title . ' was deleted.');
        return redirect('/');
    }

}
