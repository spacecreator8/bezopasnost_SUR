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
    <a href="/bezopasnost_SUR/public/">MAIN</a>
    <a href="/bezopasnost_SUR/public/login">LOGIN</a>
    <a href="/bezopasnost_SUR/public/registration">REGISTRATION</a>

    <h2>Registration</h2>

    <form action="/bezopasnost_SUR/public/registration_process" method="post">
        <div>Login</div>
        <input type="text" name="login">
        <div>Password-1</div>
        <input type="password" name="password1">
        <div>Password-2</div>
        <input type="password" name="password2">
        <button type="submit">Send</button>
    </form>
    <?php
        session_start();
        if(isset($_SESSION['warning'])){
    ?> <div style="color: red;"><?= $_SESSION['warning'] ?> </div>
    <?php
        }
        unset($_SESSION['warning']);
    ?>
</body>
</html>