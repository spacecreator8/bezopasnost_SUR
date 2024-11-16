<?php

class LoginController{
    public function index(){
        include '../views/login.php';
    }

    public function postProcess(){
        var_dump($_POST);
    }
}