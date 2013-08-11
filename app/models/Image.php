<?php

class Image extends Eloquent {
  protected $table = 'images';
  protected $fillable = array('file_name', 'property_id');

  public function property() {
    return $this->belongsTo('Property'); 
  }  
}
