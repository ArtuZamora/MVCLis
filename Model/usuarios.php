<?php
require_once('Context/Conexion.php');
class usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $edad;
    public $carnet;

    public function __construct($nombre, $apellido, $email, $telefono, $edad, $carnet)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->edad = $edad;
        $this->carnet = $carnet;
    }
}
class usuarios extends Conexion
{

    private $table = "usuarios";
    private $db;
    private $users;

    public function __construct()
    {
        $this->db = Conexion::GetConnection();
        $this->users = array();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT id,nombre,apellido,email,telefono,edad,carnet FROM " . $this->table);
        while ($rows = $query->fetch_assoc()) {
            $this->users[] = $rows;
        }
        return $this->users;
    }
    public function save($usuario)
    {

        $query = $this->db->prepare("INSERT INTO " . $this->table . " (nombre,apellido,email,telefono,edad,carnet) 
                                        VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param(
            "ssssis",
            $usuario->nombre,
            $usuario->apellido,
            $usuario->email,
            $usuario->telefono,
            $usuario->edad,
            $usuario->carnet
        );
        $result = $query->execute();
        return $result;
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        $query->bind_param("i", $id);
        $result = $query->execute();
        return $result;
    }
}
