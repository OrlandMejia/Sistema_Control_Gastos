<?php

//MANEJO DE ERRORES
error_reporting(E_ALL); // Error Exception engine, siempre se usa E_ALL

ini_set('display_reated_errors',true); // Siempre es TRUE

ini_set('display_errors', FALSE); // Error Exception display, usa falso solo en producción

ini_set('log_errors', TRUE); // Error Exception file loggin engine

ini_set("error_log","C:/xampp/htdocs/PHP/ControlGastos/php-error.log");
error_log("Inicio de aplicación WEB");

//cargar los archivos base para que funcione la aplicacion
require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'libs/app.php';

require_once('config/config.php');
$app = new App();