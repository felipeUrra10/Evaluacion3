<?php 

namespace controllers;

use models\ClienteModel as ClienteModel;

session_start();
require_once("../models/ClienteModel.php");

class ClienteController{
    public $rut;
    public $name;
    public $fono;
    public $direccion;
    public $fecha;
    public $email;
    
    public function __construct()
    {
        $this->rut =$_POST['rut'];
        $this->name =$_POST['name'];
        $this->fono =$_POST['fono'];
        $this->direccion =$_POST['direccion'];
        $this->fecha =$_POST['fecha'];
        $this->email =$_POST['email'];


    }
    public function crearCliente()
    {
        if (
            $this->rut =="" || $this->name=="" || $this->fono=="" || $this->direccion=="" || $this->fecha=="" || $this->email=="")
            {
            $_SESSION['error']="complete los campos ";
            header("Location: ../views/clientes.php");
            return;
            }

        $model = new ClienteModel;
        $dataCliente=[
            "rut" => $this->rut, "name"=> $this->name, "fono"=>$this->fono, "direccion"=>$this->direccion, "fecha"=>$this->fecha, "email"=>$this->email
        ];

        $count = $model->insertarCliente($dataCliente);
        if($count == 1){
            $_SESSION['respuesta']="cliente creado con exito";
        }else{
            $_SESSION['error']="hubo un error en la base de datos";
        }
        header("Location: ../views/clientes.php");
    }
}

$obj = new ClienteController();
$obj->crearCliente();