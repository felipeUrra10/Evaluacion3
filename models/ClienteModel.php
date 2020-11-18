<?php

namespace models;

require_once("Conexion.php");

class ClienteModel{
    public function insertarCliente($dataCliente){
        $stm= Conexion::conector()->prepare("INSERT INTO cliente VALUES (:A, :B, :C, :D, :E, :F)");
        $stm->bindParam(":A", $dataCliente['rut']);
        $stm->bindParam(":B", $dataCliente['name']);
        $stm->bindParam(":C", $dataCliente['direccion']);
        $stm->bindParam(":D", $dataCliente['fono']);
        $stm->bindParam(":E", $dataCliente['fecha']);
        $stm->bindParam(":F", $dataCliente['email']);
        return$stm->execute();
    }
}