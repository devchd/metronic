<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\View;
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login() {
    // Getting all post data
    $data = \Input::all();
    // Applying validation rules.
    $rules = array(
        'email' => 'required|email',
        'password' => 'required|min:6',
         );
    $validator = Validator::make($data, $rules);
    if ($validator->fails()){
      // If validation falis redirect back to login.
      return \Redirect::to('admin/login')->withInput(\Input::except('password'))->withErrors($validator);
    }
    else {
      $userdata = array(
            'email' => \Input::get('email'),
            'password' => \Input::get('password')
          );
      // doing login.
      if (\Auth::validate($userdata)) {
        if (\Auth::attempt($userdata)) {
          return \Redirect::intended('/categories');
        }
      } 
      else {
        // if any error send back with message.
        \Session::flash('error', 'Something went wrong'); 
        return \Redirect::to('admin/login');
      }
    }
  }
  public function logout() {
    \Auth::logout(); // logout user
    return \Redirect::to('admin/login'); //redirect back to login
  }
   
}
