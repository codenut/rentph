<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Property extends Eloquent {
  protected $fillable = array('name', 'description', 'user_id');
  
  public function user() {
    return $this->belongsTo('User'); 
  }
}
