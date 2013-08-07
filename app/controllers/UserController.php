<?php
class UserController extends BaseController {
  protected $user;

  public function getIndex() {
    $users = User::all();
    return View::make('users/users')->with('users', $users); 
  }

  public function getRegister() {
    return View::make('users/register'); 
  }

  public function getSignin() {
    return View::make('users/signin'); 
  }

  public function postAuthenticate() {
    $user = array(
      'email' => Input::get('email'),
      'password' => Input::get('password') 
    );
    $validator = User::validates($user);
    if($validator->fails()) {
      return array('result' => 'error', 'messages' => ($validator->messages()->toArray())); 
    } else {
      if(Auth::attempt($user, Input::get('remember_me'))) {
        return array('result' => 'success');
      } else {
        return array('result' => 'error', 'messages' => (array('auth_failed' => 'Invalid email/password.'))); 
      }
    }
  }

  public function postCreate() {
    $user = array(
      'email' => Input::get('email'),
      'full_name' => Input::get('full_name'),
      'password' => Input::get('password'),
      'password_confirmation' => Input::get('password_confirmation')
    );
    $validator = User::validates($user);
    if($validator->fails()) {
      return array('result' => 'error', 'messages' => ($validator->messages()->toArray()));
    } else {
      $user['password'] = Hash::make($user['password']);
      $user = User::create($user);
      return array('result' => 'success');
    }
  }

} 
