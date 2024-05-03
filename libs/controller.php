<?php
class Controller{
    protected $view;
    protected $model;
    function __construct(){
        //CREAMOS UNA VARIABLE PARA CARGAR VISTAS
        $this->view = new View();
    }

    //FUNCION PARA CARGAR LOS MODELOS DEL ARCHIVO DEL CONTROLADOR ASOCIADO
    function loadModel($model){
        $url = 'models/' . $model . 'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}