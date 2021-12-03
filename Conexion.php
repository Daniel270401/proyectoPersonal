<?php

class Conexion
{
    private $dsn = "mysql: host=localhost; dbname=proyecto";
    private $username = "root";
    private $password = "";
    private $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"');
    public $conectar;

    public function __construct()
    {
        $this->conectar = new PDO($this->dsn, $this->username, $this->password, $this->opciones);
    }

    public function Desconectar()
    {
        $this->conectar = null;
    }
}