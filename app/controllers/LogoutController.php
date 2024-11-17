<?php

class LogoutController{
    public function index(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['auth_user'])){
            unset($_SESSION['auth_user']);
            header('Location: /bezopasnost_SUR/public/');
            exit();
        }
    }
}