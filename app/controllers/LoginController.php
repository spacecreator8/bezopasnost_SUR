<?php
require_once '../database/rb-mysql.php';
class LoginController{
    public function index(){
        include '../views/login.php';
    }

    public function postProcess(){
        R::setup('mysql:host=localhost;dbname=custom', 'root', '');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = R::findOne('user', 'login = ?', [$login]);

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['auth_user'] = $user->id;
                $_SESSION['login_user'] = $user->login;
                $_SESSION['email_user'] = $user->email;
                header('Location: /bezopasnost_SUR/public/for_auth');
                exit();
            } else {
                $_SESSION['warning'][] = 'Удостоверьтесь, что пользователь с такими данными записан в базе данных.';
                header('Location: /bezopasnost_SUR/public/login');
                exit();
            }
        }
    }
}