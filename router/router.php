<?php

    class Router{
        private $routes = [];

        public function addRoute($method, $path, $controller, $action){
            $this->routes[] = [
                'method'=>$method,
                'path'=>$path,
                'controller'=>$controller,
                'action'=>$action,
            ];
        }

        public function resolve(){
            $rPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $rMethod = $_SERVER['REQUEST_METHOD'];

            foreach($this->routes as $route){
                if($route['path']==$rPath && $route['method']==$rMethod){
                    $controllerName = $route['controller'];
                    $actionName = $route['action'];

                    if(class_exists($controllerName) && method_exists($controllerName, $actionName)){
                        $controller = new $controllerName();
                        return $controller->$actionName();
                    }
                    http_response_code(404);
                    echo "Контроллер/Метод не найден.<br>";
                    return;
                }
                http_response_code(404);
//                echo "Нету такого URL. <br>";
            }
        }



    }