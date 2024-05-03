<?php
/**
 * Class Model
 * @property Database $db
 */
class Model{

    function __construct(){
        $this->db = new Database();
    }

    //FUNCIONES PARA FACILIAR EL USO DEL MODELO
    function query($query){
        return $this->db->connect()->query($query);
    }

    //FUNCION PARA PREPARAR LA CONSULTA Y TRAER LOS PLACEHOLDERS
    function prepare($query){
        return $this->db->connect()->prepare($query);
    }
}