<?php

class Mahasiswa extends Controller {
    public function index(){
       // Rangkai view nya
       $data['judul'] = 'Daftar Mahasiswa';

       $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

       $this->view('templates/header', $data);
       $this->view('mahasiswa/index', $data);
       $this->view('templates/footer');

    }

    // memanggil parameter $id yg dikirikamkan di url
    public function detail($id){
        // Rangkai view nya
        $data['judul'] = 'Detail Mahasiswa';
 
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
 
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
 
     }


     public function tambah()
     {
         if ( $this->model('mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
           header('Location: ' . BASEURL . '/mahasiswa');
           exit; 
         }
     }

     
}