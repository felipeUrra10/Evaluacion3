<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

session_start();

require_once("../models/UsuarioModel.php");

class ControlTabla
{
    public $bt_edit;

    public function __construct()
    {
        $modelo = new UsuarioModel;
        $this->bt_edit = $_POST['bt_edit'];

        if(isset($this->bt_edit)){

            $_SESSION['editar']="ON";
            $usuario = $modelo->buscarUsuario($this->bt_edit);
            $_SESSION['usuario'] = $usuario[0];

            header("Location: ../views/gestion.php");
        }
    }


    public function procesar()
    {
        // if (isset($this->bt_edit)) {
            // echo "editar el ID $this->bt_edit";
            // session_start();
            // $_SESSION['editar'] = "ON";
            // $modelo = new TareaModel();
            // $tarea = $modelo->buscarTarea($this->bt_edit);
            // $_SESSION['tarea'] = $tarea[0];

            // header("Location: ../index.php");
        // } else {
            //echo "eliminar el ID $this->bt_delete";
            // $modelo = new TareaModel();
            // $modelo->eliminarTarea($this->bt_delete);
            // header("Location: ../index.php");
    //  }
    }
}

$obj = new ControlTabla();
$obj->procesar();