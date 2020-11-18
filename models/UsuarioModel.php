<?php

namespace models;

require_once("Conexion.php");

class UsuarioModel
{

    public function insertarUsuario($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A, :B, :C, :D, :E)");
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C",$data['rol']);
        $stm->bindParam(":D",md5($data['clave']));
        $stm->bindParam(":E",$data['estado']);
        return $stm->execute();
    }


    public function buscarUsuarioLogin($rut,$clave, $estado){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND estado=1");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));  
        $stm->execute(); 
        return $stm->fetchAll(\PDO::FETCH_ASSOC);    
    }

    public function getAllUsuarios(){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarUsuario($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A");
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarUsuario($rut){
        $stm = Conexion::conector()->prepare("DELETE FROM usuario WHERE rut=:A");
        $stm->bindParam(":A", $rut);
        return $stm->execute();
    }

    public function editarUsuario($rut, $data){
        $stm = Conexion::conector()->prepare("UPDATE usuario SET nombre=:A, estado=:B WHERE rut=:E");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['estado']);
        $stm->bindParam(":E", $rut);
        return $stm->execute();
    }
}