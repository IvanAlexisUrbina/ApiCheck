<?php
class Connection 
{
    private $server;
    private $user;
    private $pass;
    private $database;
    private $port;
    private $link;

    function __construct($server, $user, $pass, $database, $port = 3306){
        $this->server = $server;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->port = $port;
        $this->connect();
    }

    private function connect(){
        $this->link = mysqli_connect($this->server, $this->user, $this->pass, $this->database, $this->port);
        if (mysqli_connect_errno()) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }else {
            echo 'Conexion exitosa';
        }
    }

    public function getConnect(){
        if ($this->link && mysqli_ping($this->link)) {
            return $this->link;
        }
        throw new Exception("No hay conexión a la base de datos");
    }

    public function close(){
        if ($this->link && mysqli_ping($this->link)) {
            mysqli_close($this->link);
            $this->link = null;
        }
    }
}
?>