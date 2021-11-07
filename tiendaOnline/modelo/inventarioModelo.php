<?php

require_once "conexion.php";

class modeloInventario
{

    public static function mdlActualizarStock($lista)
    {
        $mensaje = "";
        foreach ($lista as $key => $value) {
            $id = $value->idProducto;
            $stock = $value->stock;
            $cantidadCompra = $value->cantidadCompra;
            $nuevaCantidad = $stock - $cantidadCompra;

            try {

                $objRespuesta = Conexion::conectar()->prepare("update productos set stock='$nuevaCantidad' where idProducto = '$id'");
                if ($objRespuesta->execute()) {
                    $mensaje = "ok";
                } else {
                    $mensaje = "error al modificar Stock";
                }
            } catch (Exception $e) {
                $mensaje = $e;
            }

            $objRespuesta = null;

            if ($mensaje != "ok") {
                break;
            }
        }
        return $mensaje;
    }
}
