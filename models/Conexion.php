<?php

namespace models;


class Conexion
{
    public static $user = "uav7qoppox65gxce";
    public static $pass = "IIIHD9CTMn94TDTbolDi";
    public static $URL = "mysql:host=budpvrxq6x9kp49wtix2-mysql.services.clever-cloud.com;dbname=budpvrxq6x9kp49wtix2";

    public static function conector()
    {
        try {
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            return null;
        }
    }
}