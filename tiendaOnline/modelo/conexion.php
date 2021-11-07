<?php

class Conexion
{

    public static function conectar()
    {

        $servidor = "localhost";
        $baseDAtos = "pagosonline";
        $usuario = "root";
        $contraseña = "";

        try {
            $objConexion = new PDO('mysql:host=' . $servidor . ';dbname=' . $baseDAtos . ';', $usuario, $contraseña);
            $objConexion->exec("set names utf8");
        } catch (Exception $r) {
            $objConexion = $r;
        }

        return $objConexion;
    }
}
