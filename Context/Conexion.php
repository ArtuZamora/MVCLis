<?php
class Conexion{
    public function GetConnection(){
        return new mysqli('localhost', 'root', '', 'mvc');
    }
}
?>