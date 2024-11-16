<?php

class RegistrationController{
    public function index(){
        include '../views/registration.php';
    }

    public function postProcess(){
        var_dump($_POST);
    }
}