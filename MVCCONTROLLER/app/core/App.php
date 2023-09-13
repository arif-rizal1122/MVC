<?php 

class App {
    // property dengan visibility proctected untuk menentukan contoller method dan parameter default
    protected $controller = 'Home';
    protected $method = 'index';
    // params nya [] kosong karena default nya memang kosong
    protected $params = [];


    public function __construct(){
        $url = $this->parseURL();
        // url akan berisi apapun yg diketik di url nya
        // this controller (ada gak file yg namanya home.php didalam folder controlllers jika ada buat controllers yg baru mengantikan controller yg lama)
        if (file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);

        }
        
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method controller dari file Home.php yg berada dlm folder controllers diinisialisasi agar bisa digunakan class nya disini

        // metod 
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
               $this->method = $url[1]; 
               unset($url[1]);
            }
        }
        // params
        if( !empty($url)){
            var_dump($url);
        }

    }

    public function parseURL(){
        if(isset($_GET['url'])){

            $url = rtrim( $_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            // kembalikan nilai yg diolah
            return $url;

        }
    }
}
 
