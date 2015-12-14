<?php

namespace p4\Http\Controllers\Auth;

use p4\User;
use Validator;
use p4\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    # Where should the user be redirected to if their login succeeds?
    protected $redirectPath = '/';

    # Where should the user be redirected to if their login fails?
    protected $loginPath = '/login';

    # Where should the user be redirected to after logging out?
    protected $redirectAfterLogout = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'profile' => 'image',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $fileName = 'generic.jpg';
        if (Input::hasFile('profile')) {
            if (Input::file('profile')->isValid()) {
                $destinationPath = public_path('uploads/');
                $extension = Input::file('profile')->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                \Input::file('profile')->move($destinationPath, $fileName);
            }
        }
            return User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'profile' => $fileName,
                'climbing_style' => $data['climbing_style'],
                'location' => $data['location'],
            ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        \Auth::logout();
        \Session::flash('flash_message','You have been logged out.');
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}
