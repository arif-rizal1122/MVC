<?php
// class controller ini mengatur controller lainya di folder controllers


class Controller {

  // ($view 'ini menangkap view dari folder controllers nya')
  public function view($view, $data = [] ){
    // ini mencari adakah file yg namanya view
    require_once '../app/views/' . $view . '.php';

  }
 

  // ini controller pada model nya
  public function model($model){
    require_once '../app/models/' . $model . '.php';
    
    return new $model;
  }
};

