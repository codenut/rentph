<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

  protected $table = 'users';
  protected $hidden = array('password');
  protected $fillable = array('full_name', 'email', 'password');

  public function properties() {
    return $this->hasMany('Property'); 
  }

  public function getAuthIdentifier() {
    return $this->getKey();
  }

  public function getAuthPassword() {
    return $this->password;
  }

  public function getReminderEmail() {
    return $this->email;
  }

  public static function validates($input) {
    $rules = array(
      'email' => 'required|email', 
      'password' => 'required',
      'password_confirmation' => 'required|between:4,8',
      'full_name' => 'required|min:6');

    $apply_rules = array();
    foreach($input as $key => $rule) {
      if(array_key_exists($key, $rules)) {
        $apply_rules[$key] = $rules[$key];
      }
    }

    if(array_key_exists('password_confirmation', $input)) {
      $apply_rules['password'] = 'required|confirmed|between:4,8'; 
      $apply_rules['email'] = 'required|unique:users|email'; 
    }

    return Validator::make($input, $apply_rules); 
  }

}
