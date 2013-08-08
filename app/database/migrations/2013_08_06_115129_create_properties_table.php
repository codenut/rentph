<?php

use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

  public function up() {
    Schema::create('properties', function($table) {
      $table->increments('id');
      $table->string('name', 255);
      $table->string('description', 255);
      $table->integer('user_id');
      $table->string('property_type', 64);
      $table->integer('accommodates');
      $table->decimal('price');
      $table->string('country', 255);
      $table->string('street', 255);
      $table->string('city', 255);
      $table->string('zip_code', 16);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('properties');    
  }

}
