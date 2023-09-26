<?php


class Home extends Controller {

    public function index() {

      // ini mreangkai menjadi 1 html yg utuh
      
      $data['judul'] = 'home';

      // ini mengirimkan data dari models
      // $this->model('User_model')->getUser();
      // panggil class model dan panggil method didalamnya getUser();
      $data['nama'] = $this->model('User_model')->getUser();

      // ini mengisi nya dari url
      $this->view('templates/header', $data);
      // ini mengisi nya dari model
      $this->view('home/index', $data);
      $this->view('templates/footer');

    }
}