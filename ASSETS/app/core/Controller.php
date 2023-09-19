<?php
// class controller ini mengatur controller lainya di folder controllers


class Controller {

  public function view($view, $data = [] ){
    // ini mencari adakah file yg namanya view
    require_once '../app/views/' . $view . '.php';

  }

} 

