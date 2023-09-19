<?php 

class App {
    /* Property untuk menentukan controller dan method default */
    protected $controller = 'Home'; 
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();
    
        /*## ALL ABOUT CONTROLLER ##*/ 

        // ada gak file yg namanya Home.php di folder controllers
        if( file_exists('../app/controllers/' . $url[0] . '.php')){
            // kalau ada controller yg lama ditimpa dgn yg baru.
            $this->controller = $url[0];    
            unset($url[0]);

        }

        // ini sama dengan masuk ke file home.php di controllers folder
        require_once '../app/controllers/' . $this->controller .'.php';

        // instansiasi class agar about bisa diakses juga
        $this->controller = new $this->controller;
        



        /*## ALL ABOUT method ##*/ 
        // menjadikan index di url sebagai methodnya
        // [1] = index (home/index)
        // cek apkh method ada di controllers nya
        if (isset($url[1])){
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);

            }
        }

        // manage params
        if (!empty($url)){
            // ambil datanya
            $this->params = array_values($url);
        }

        // jalankan controller & method jika ada , serta kirimkan params jika ada..
        call_user_func_array([$this->controller, $this->method], $this->params);

    }




    // prettier url {mempercantik url nya}
    public function parseURL(){
        // jika ada $url yg dikirim maka ambil datanya
        if(isset($_GET['url'])){
            $url = rtrim( $_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            // kembalikan nilai yg diolah
            return $url;

        }
    }
}
 


