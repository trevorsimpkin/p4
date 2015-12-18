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
        $climbs = \p4\Climb::orderBy($sort,'ascending')->paginate(10);
        return view('climbs.index')
            ->with([
                'climbs'=>$climbs,
        ]);
    }
    public function getShow($id = null) {
        $climb = \p4\Climb::find($id);
        $user = \Auth::user();
        if (is_null($climb)) {
            \Session::flash('flash_message', 'Climb not found.');
            return redirect('/');
        }
        $exists = $user->climbs->contains($id);
        return view('climbs.show')
            ->with([
                'climb' => $climb,
                'user' => $user,
                'exists' => $exists,
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
        $regex ="#^https?://([a-z0-9-]+\.)*mountainproject\.com(/.*)?$#";
        $this->validate(
            $request,
            [
                'title' => 'required|unique:climbs',
                'difficulty' => 'required',
                "mountain_project_link" => array("regex:".$regex)
            ]
        );
        $climb = \p4\Climb::find($request->id);
        $climb->title = $request->title;
        $climb->difficulty = $request->difficulty;
        $climb->location = $request->location;
        $climb->type = $request->type;
        $climb->safety_rating = $request->safety_rating;
        $climb->description = $request->description;
        $climb->mountain_project_link = $request->mountain_project_link;
        $climb->save();
        $url = '/user/'.\Auth::id();
        \Session::flash('flash_message','Your climb was edited!');
        return redirect($url);
    }
    public function getCreate() {
        return view('climbs.create');
    }


    public function postCreate(Request $request) {
        $regex ="#^https?://([a-z0-9-]+\.)*mountainproject\.com(/.*)?$#";
        $this->validate(
            $request,
            [
                'title' => 'required|unique:climbs',
                'difficulty' => 'required',
                "mountain_project_link" => array("regex:".$regex)
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
        $climb->save();
        $user = \Auth::user();
        $user->climbs()->save($climb);
        $url = '/user/'.$user->id;
        \Session::flash('flash_message','Your climb was added!');
        return redirect($url);
    }
    public function getConfirmDelete($climb_id) {
        $climb = \p4\Climb::find($climb_id);
        if($climb->administrator != \Auth::id()) {
            \Session::flash('flash_message','You are not the administrator of this climb.');
            return redirect('/');
        }
        return view('climbs.delete')-> with('climb', $climb);
    }
    public function getAdmin($id = null) {
        $climb = \p4\Climb::find($id);
        if(is_null($climb)) {
            \Session::flash('flash_message','Climb not found.');
            return redirect('/');
        }
        if($climb->administrator != \Auth::id()) {
            \Session::flash('flash_message','You are not the administrator of this climb.');
            return redirect('/');
        }
        return view('climbs.admin')
            ->with([
                'climb' => $climb,
            ]);
    }
    public function postAdmin(Request $request) {
        $this->validate(
            $request,
            [
                'administrator' => 'required',
            ]
        );
        $newAdmin = $request->administrator;
        $climb = \p4\Climb::find($request->id);
        $user = \p4\User::where('username', $newAdmin)->first();
        if(is_null($user)) {
            \Session::flash('flash_message','User does not exist.');
            return redirect('/');
        }
        $id = $user->id;
        $climb ->administrator = $id;
        $exists = $user->climbs->contains($climb->id);
        if(!$exists) {
            $user->climbs()->save($climb);
        }
        else {
            $climb->save();
        }
        \Session::flash('flash_message','Administrator privileges reassigned.');
        return redirect('/');
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
