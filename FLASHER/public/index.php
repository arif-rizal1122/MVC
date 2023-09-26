<?php

// session itu harus dijalankan agar bisa berfungsi
// jika di dalam aplikasi kita tidak session_id maka jalankaan session start

// session ini dijalankan dari awal
if( !session_id())
{
    session_start();
}

require_once '../app/init.php';

// ini adlah yg dinamakan bootstraping

// ini menjalankan class di file yg berada di '../app/core'
$app = new App;