<?php 

class App {
    public function __construct(){
        // $url ini adl $url yg di parsing
        $url = $this->parseURL();
        var_dump($url);
        // echo $url;

    }
    // prettier url {mempercantik url nya}
    public function parseURL(){
        // jika ada $url yg dikirim maka ambil datanya
        if(isset($_GET['url'])){
            /* rtrim ini digunakan untuk membersihkan tanda slash nya diakhir url nya */ 
            $url = rtrim( $_GET['url'], '/');
            /* dibawah ini cara membersihkan url dari karacter yg ngaco/aneh (karackter khusus) */ 
            $url = filter_var($url, FILTER_SANITIZE_URL);
            /* memecah url berdasarkan tanda slash mengunakan explode dan mengubahnya menjadi array */
         
            $url = explode('/', $url);
            // kembalikan nilai yg diolah
            return $url;

        }
    }
}
 

// htacces digunakan untuk memodifikasi config server apache dan ini bisa dilakukan per folder nya


