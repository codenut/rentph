<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  public function up() {
    Schema::create('users', function($table) {
      $table->increments('id');
      $table->string('email', 64)->unique();
      $table->string('full_name', 128);
      $table->string('password', 128);

      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('users');
  }

}
