<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once '../router/router.php';
        require_once '../app/controllers/MainController.php';
        require_once '../app/controllers/LoginController.php';
        require_once '../app/controllers/RegistrationController.php';

        $router = new Router();
        $router->addRoute('GET', '/bezopasnost_SUR/public/', 'MainController', 'index');
        $router->addRoute('GET', '/bezopasnost_SUR/public/login', 'LoginController', 'index');
        $router->addRoute('GET', '/bezopasnost_SUR/public/registration', 'RegistrationController', 'index');

        $router->resolve();

    ?>

</body>
</html>