<?php 

class About extends Controller{

  public function index(){
    $this->view('home/index');
  }
  public function page(){
    $this->view('about/page');
  }

}

