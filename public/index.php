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
        require_once '../app/controllers/ForAuthController.php';
        require_once '../app/controllers/LogoutController.php';

        $router = new Router();
        $router->addRoute('GET', '/bezopasnost_SUR/public/', 'MainController', 'index');
        $router->addRoute('GET', '/bezopasnost_SUR/public/login', 'LoginController', 'index');
        $router->addRoute('POST', '/bezopasnost_SUR/public/login_process', 'LoginController', 'postProcess');
        $router->addRoute('GET', '/bezopasnost_SUR/public/registration', 'RegistrationController', 'index');
        $router->addRoute('POST', '/bezopasnost_SUR/public/registration_process', 'RegistrationController', 'postProcess');
        $router->addRoute('GET', '/bezopasnost_SUR/public/for_auth', 'ForAuthController', 'index');
        $router->addRoute('GET', '/bezopasnost_SUR/public/logout', 'LogoutController', 'index');

        $router->resolve();

    ?>

</body>
</html>