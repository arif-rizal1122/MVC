<?php


class Controller {
    

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}

// ini menghubungkan ke folder views