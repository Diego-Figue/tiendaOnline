<?php
include_once "conexion.php";
class modeloProductos{

    public static function mdlListarProductos(){

        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM productos ORDER BY idCategoria asc");
        $objRespuesta->execute();
        $objListaProductos = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objListaProductos;

    }

}