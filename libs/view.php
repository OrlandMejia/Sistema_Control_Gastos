<?php

class View {
    // Declarar explícitamente la propiedad $d
    protected $d;
    function __construct() {
        
    }

    //funcion para renderizar las vistas
    function render($nombre, $data = []){
        //variables
        $this->d = $data;

        require 'views/'. $nombre. '.php';
    }
}