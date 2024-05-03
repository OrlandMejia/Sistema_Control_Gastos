<?php
/**
 * Class Login
 * @property View $view
 */
CLASS Login extends Controller{
    public function __construct(){
        //mandamos a llamar al constructor padre
        parent::__construct();
        error_log("Login::construct -> inicio de Login");
    }

    //funcion para renderizar vistas
    function render(){
        $this->view->render('login/index');
        error_log("Login::render -> Carga el Index del Login");
    }
}
