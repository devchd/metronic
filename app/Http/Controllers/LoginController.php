<?php
namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\View;

class LoginController extends BaseController {
  public function login() {
    // Getting all post data
    $data = Input::all();
    // Applying validation rules.
    $rules = array(
		'email' => 'required|email',
		'password' => 'required|min:6',
	     );
    $validator = Validator::make($data, $rules);
    if ($validator->fails()){
      // If validation falis redirect back to login.
      return Redirect::to('admin/login')->withInput(Input::except('password'))->withErrors($validator);
    }
    else {
      $userdata = array(
		    'email' => Input::get('email'),
		    'password' => Input::get('password')
		  );
      // doing login.
      if (Auth::validate($userdata)) {
        if (Auth::attempt($userdata)) {
          return Redirect::intended('/categories');
        }
      } 
      else {
        // if any error send back with message.
        Session::flash('error', 'Something went wrong'); 
        return Redirect::to('admin/login');
      }
    }
  }
  public function logout() {
    Auth::logout(); // logout user
    return Redirect::to('admin/login'); //redirect back to login
  }
}

?>

