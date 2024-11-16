<?php
require '../database/rb-mysql.php';
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
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            if ($password1 == $password2) {
                $user = R::dispense('user');
                $user->login = $login;
                $user->password = password_hash($password1, PASSWORD_BCRYPT);
                R::store($user);
            } else {
                $_SESSION['warning'] = 'Пароли не совпадают.';
                header('Location: /bezopasnost_SUR/public/registration');
                exit();
            }
        }
        var_dump($_POST);
    }
}