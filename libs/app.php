<?php

// TODO SE HARÁ MEDIANTE CLASES
class App{
    public function __construct(){
        //VALIDAMOS SI EXISTE UNA URL PARA LUEGO REDIRIGIR
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        if($url !== null){
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        }


        //VALIDACIONES PARA VERIFICAR QUE SE QUIERA CARGAR UN CONTROLADOR VALIDO
        if(empty($url[0])){
            error_log('APP::construct-> no hay controlador especificado');
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return;
        }
        //EN CASO DE QUE LA URL SI CONTENGA UNA URL VALIDA
        $archivoController = 'controllers/'.$url[0].'php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //si no hay ningun metodo para cargar se carga uno por default

            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        // NO HAY PARAMETROS 
                        $nparam = count($url) - 2;
                        //ARREGLO DE PARAMETROS
                        $params = [];
                        // CICLO FOR QUE RECORRE EL ARREGO ARRIBA E INYECTA LOS PARAMETROS SI LOS HUBIERA AL ARREGLO GLOBAL
                        for($i = 0; $i< $nparam; $i++){
                            array_push($params, $url[$i+2]);
                        }
                        $controller->{$url[1]}($params);
                    }else{
                        //NO TIENE PARAMETROS, SE MANDA A LLMAR EL METODO TAL CUAL
                        $controller->{$url[1]}();
                    }
                }
            }else{
                //NO HAY METODO A CARGAR, SE CARGA EL METODO DEFAULT
                $controller->render();
            }
        }else{
            //NO EXISTE EL ARCHIVO, MANDA ERROR
        }
    }
    
}