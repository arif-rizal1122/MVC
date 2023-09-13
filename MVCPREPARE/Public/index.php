<?php


// teknik boostraping dimana kita hanya memanggil satu file terus file yg dipanggil akan memanggil semua aplikasi mvc nya.. models, controller, dan vieaws  
require_once '../App/init.php';

// ini menjalankan class App.php di folder core nya

$app = new App();