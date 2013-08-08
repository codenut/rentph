<?php

class HomeController extends BaseController {

  public function showWelcome() {
    return View::make('hello');
  }

  public function getIndex() {
    return View::make('home/index');
  }

}
