<?php
require('Model/usuarios.php');
class UsuarioController{
    private $model;
    public $error_log;

    public function __CONSTRUCT(){
        $this->model = new usuarios();
    }
    public function Index(){
        $datos = $this -> model -> getAll();
        require_once 'Views/V_verUsuarios.php';
    }
    public function Add(){
        if(isset($_POST['add']))
        {
            require 'Validation/procesar.php';
            if(count($error_log) == 0)
            {
                $usuario = new usuario(
                    $_POST['usuario']['nombre'],
                    $_POST['usuario']['apellido'],
                    $_POST['usuario']['email'],
                    $_POST['usuario']['telefono'],
                    $_POST['usuario']['edad'],
                    $_POST['usuario']['carnet']
                );
                $this -> model -> save($usuario);
                unset($_POST);
            }
        }
        $this->error_log = $error_log;
        $this->Index();
    }
    public function Delete($id){
        if(isset($id))
            $this -> model -> delete($id);
        header('Location: index.php');
    }
}
