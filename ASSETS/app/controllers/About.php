<?php 

class About extends Controller {
    
    public function index( $nama= 'sandhi', $work= 'salesman', $age= 11){

        $data['nama'] = $nama;
        $data['work'] = $work;
        $data['age'] = $age;
        $data['judul'] = 'about me';

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');

    }

    public function page(){

        $data['judul'] = 'my page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');

    }
}