<?php 


// class home ini akan exstends ke class controller.php yg ada di folder core nya 
class Home extends Controller {

    // method ini akan menjadi default ketika kita tidak menuliskan apapun di url nya maka method ini yg akan
    public function index(){
        // ini artinya home adl controller dan index adl method
        $this->view('home/index');
    }
}