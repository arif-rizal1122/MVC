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


    // SET FLASHER DI CONTROLLER TAMBAH 

    // SEBELUM DI REDIRECT MAKA SET DULU FLASHER NYA

     public function tambah()
     {
         if ( $this->model('mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
           // sebelum redirect set dulu session nya
          //  Flasher::setFlash($pesan, $aksi, $type);

           Flasher::setFlash('berhasil', 'ditambahkan', 'success');
           header('Location: ' . BASEURL . '/mahasiswa');
           exit; 
         } else {
          Flasher::setFlash('gagal', 'ditambahkan', 'danger');
          header('Location: ' . BASEURL . '/mahasiswa');
          exit; 
         }
     }

     
}