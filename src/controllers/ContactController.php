<?php

namespace App\controllers;

class ContactController {
    
    public function displayContact(){
        require_once "src/views/contact.phtml";
    }
}