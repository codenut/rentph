<?php
class UserController extends BaseController {
  protected $user;

  public function getIndex() {
    $users = User::all();
    return View::make('users/users')->with('users', $users); 
  }

  public function getRegister() {
    return View::make('users/register', array('title' => 'Register')); 
  }

  public function getSignin() {
    return View::make('users/signin', array('title' => 'Sign in')); 
  }

  public function getSignout() {
    Auth::logout();
    return Redirect::to('/'); 
  }

  public function postAuthenticate() {
    $user = Input::all();
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
    $user = Input::all();
    $validator = User::validates($user);
    if($validator->fails()) {
      return array('result' => 'error', 'messages' => ($validator->messages()->toArray()));
    } else {
      $user['password'] = Hash::make($user['password']);
      $user = User::create($user);
      Auth::login($user);
      return array('result' => 'success');
    }
  }

} 
