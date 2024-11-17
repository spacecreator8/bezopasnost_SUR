<?php

require_once '../database/rb-mysql.php';
require_once '../app/services/ValidatorEmailService.php';
require_once '../app/services/ValidatorPasswordService.php';

class RegistrationController{
    public function index(){
        include '../views/registration.php';
    }

    public function postProcess()
    {
        R::setup('mysql:host=localhost;dbname=custom', 'root', '');

        if (!R::testConnection()) {
            die('Не удалось подключиться к базе данных.');
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            $emailValidation = new ValidatorEmailService();
            $passwordValidation = new ValidatorPasswordService();
            $emailValidation = $emailValidation->checkEmail($email);
            $passwordValidation = $passwordValidation->checkPassword ($password1);

            if(!isset($_SESSION['warning'])){
                $_SESSION['warning'] = [];
            }
            $_SESSION['warning'] = array_merge($_SESSION['warning'], $emailValidation, $passwordValidation);

            if ($password1 == $password2) {
                if(empty($_SESSION['warning'])){
                    $user = R::dispense('user');
                    $user->login = $login;
                    $user->email = $email;
                    $user->password = password_hash($password1, PASSWORD_BCRYPT);
                    R::store($user);
                    header('Location: /bezopasnost_SUR/public/login');
                }else{
                    header('Location: /bezopasnost_SUR/public/registration');
                    exit();
                }
            } else {
                $_SESSION['warning'][] = 'Пароли не совпадают.';
                header('Location: /bezopasnost_SUR/public/registration');
                exit();
            }
        }
    }
}