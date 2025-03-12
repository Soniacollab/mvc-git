<?php

namespace App\controllers;

class HomeController {
    
    public function display(){
        require_once "src/views/home.phtml";
    }
}