<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/bezopasnost_SUR/public/">Main</a>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['auth_user'])){
        ?><a href="/bezopasnost_SUR/public/login">Login</a><?php
        ?><a href="/bezopasnost_SUR/public/registration">Registration</a><?php
    }
    ?>

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['auth_user'])){
        ?><a href="/bezopasnost_SUR/public/for_auth">ForAuth</a><?php
        ?><a href="/bezopasnost_SUR/public/logout">Logout</a><?php
    }
    ?>

    <h2>Registration</h2>

    <form action="/bezopasnost_SUR/public/registration_process" method="post">
        <div>Login</div>
        <input type="text" name="login">
        <div>Email</div>
        <input type="text" name="email">
        <div>Password-1</div>
        <input type="password" name="password1">
        <div>Password-2</div>
        <input type="password" name="password2">
        <button type="submit">Send</button>
    </form>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        if(isset($_SESSION['warning'])){
            foreach($_SESSION['warning'] as $er){
                ?> <div style="color: red;"><?= $er ?> </div>
                <?php
            }
        }
        unset($_SESSION['warning']);
    ?>
</body>
</html>