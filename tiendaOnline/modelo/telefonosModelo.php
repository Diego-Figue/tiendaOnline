<?php
include_once "conexion.php";

class modeloTelefonos
{

    public static function mdlRegistrarTelefonos($nombre, $descripcion, $stock, float $valor, $iva, $idCategoria, $codigo, $foto)
    {
        $mesaje = "";
        $nombreArchivo = $foto['name'];
        $rutaArchivo = "../vista/img/" . $nombreArchivo;
        $extencion = substr($nombreArchivo, -4);
        $url = "vista/img/" . $nombreArchivo;

        if (($extencion == ".jpg" || $extencion == ".JPG") || ($extencion == ".png" || $extencion == ".PNG") || ($extencion == ".jpng" || $extencion == ".JPNG")) {

            if (move_uploaded_file($foto['tmp_name'], $rutaArchivo)) {

                try {
                    $objRegistrarTelefono = Conexion::conectar()->prepare("INSERT INTO productos(nombre,descripcion,stock,valor,iva,idCategoria,codigo,url)VALUES(:nombre,:descripcion,:stock,:valor,:iva,:idCategoria,:codigo,:url)");
                    $objRegistrarTelefono->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $objRegistrarTelefono->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
                    $objRegistrarTelefono->bindParam(":stock", $stock, PDO::PARAM_INT);
                    $objRegistrarTelefono->bindParam(":valor", $valor);
                    $objRegistrarTelefono->bindParam(":iva", $iva, PDO::PARAM_INT);
                    $objRegistrarTelefono->bindParam(":idCategoria", $idCategoria);
                    $objRegistrarTelefono->bindParam(":codigo", $codigo, PDO::PARAM_STR);
                    $objRegistrarTelefono->bindParam(":url", $url, PDO::PARAM_STR);

                    if ($objRegistrarTelefono->execute()) {
                        $mesaje = "ok";
                    } else {
                        $mesaje = "error";
                    }
                    $objRegistrarTelefono = null;
                } catch (Exception $e) {
                    $mesaje = $e;
                }
            } else {
                $mesaje = "No fue posible subir el archivo";
            }
        } else {
            $mesaje = "El formato de archivo no es compatible";
        }

        return $mesaje;
    }

    public static function mdlListarTelefonos()
    {
        $objListaTelefono = Conexion::conectar()->prepare("SELECT * FROM productos");
        $objListaTelefono->execute();
        $listaTelefono = $objListaTelefono->fetchAll();
        $objListaTelefono = null;
        return $listaTelefono;
    }

    public static function mdlModificarTelefonos($idProducto, $nombre, $descripcion, $stock, $valor, $iva, $idCategoria, $codigo)
    {
        $mensaje = "";

        try {
            $objModificarTelefono = conexion::conectar()->prepare("UPDATE productos SET nombre=:nombre,descripcion=:descripcion,stock=:stock,valor=:valor,iva=:iva,idCategoria=:idCategoria,codigo=:codigo where idProducto='$idProducto'");
            $objModificarTelefono->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $objModificarTelefono->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $objModificarTelefono->bindParam(":stock", $stock, PDO::PARAM_STR);
            $objModificarTelefono->bindParam(":valor", $valor, PDO::PARAM_STR);
            $objModificarTelefono->bindParam(":iva", $iva, PDO::PARAM_STR);
            $objModificarTelefono->bindParam(":idCategoria", $idCategoria);
            $objModificarTelefono->bindParam(":codigo", $codigo, PDO::PARAM_STR);

            if ($objModificarTelefono->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "error";
            }
        } catch (Exception $th) {
            $mensaje = $th;
        }

        return $mensaje;
    }
    public static function mdlEliminarTelefonos($idProducto, $foto)
    {

        $mensaje = "";

        if (!unlink("../" . $foto)) {
            $mensaje = "No fue posible eliminar la imagen";
        } else {

            try {
                $objEliminar = conexion::conectar()->prepare("DELETE FROM productos WHERE idProducto=:idProducto");
                $objEliminar->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
                if ($objEliminar->execute()) {
                    $mensaje = "ok";
                    $objEliminar = null;
                } else {
                    $mensaje = "error";
                }
            } catch (Exception $e) {
                $mensaje = $e;
            }
        }

        return $mensaje;
    }
}
