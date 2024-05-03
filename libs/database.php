<?php
//CODIGO QUE CONTENDRA LA CONEXION HACIA LA BASE DE DATOS TODO MANEJADO COMO CLASES
class Database{
    //VARIABLES DE CONEXION
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    //CONSTRUCTOR
    public function __construct(){
        $this->host = constant('HOST');
        $this->db= constant('DB');
        $this->user= constant('USER');
        $this->password= constant('PASSWORD');
        $this->charset= constant('CHARSET');

        //FUNCION PARA LA CONEXION DE LA DB
        function connect(){
            try {
                $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

                $pdo = new PDO($connection, $this->user, $this->password, $options);
                error_log("Conexión a DB Exitosa");
                return $pdo;
            } catch (PDOException $e) {
                error_log("Error de Conexión: ".$e->getMessage());
            }
        }
    }
}