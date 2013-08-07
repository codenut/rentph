<?php

use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

  public function up() {
    Schema::create('properties', function($table) {
      $table->increments('id');
      $table->string('name', 255);
      $table->string('description', 255);
      $table->integer('user_id');

      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('properties');    
  }

}
