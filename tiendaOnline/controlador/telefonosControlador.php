<?php

include_once "../modelo/telefonosModelo.php";

class controlTelefonos{
    public $idProducto;
    public $nombre;
    public $descripcion;
    public $stock;
    public $valor;
    public $iva;
    public $idCategoria;
    public $codigo;
    public $foto;

    public function ctrRegistrarTelefonos(){
        $objRespuesta = modeloTelefonos::mdlRegistrarTelefonos($this->nombre,$this->descripcion,$this->stock,$this->valor,$this->iva,$this->idCategoria,$this->codigo,$this->foto);
        echo json_encode($objRespuesta);
    }

    public function ctrListarTelefonos(){
        $objRespuesta = modeloTelefonos::mdlListarTelefonos();
        echo json_encode($objRespuesta);
    }

    public function ctrModificarTelefonos(){
        $objRespuesta = modeloTelefonos::mdlModificarTelefonos($this->idProducto,$this->nombre,$this->descripcion,$this->stock,$this->valor,$this->iva,$this->idCategoria,$this->codigo,$this->foto);
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarTelefonos(){
        $objRespuesta = modeloTelefonos::mdlEliminarTelefonos($this->idProducto,$this->foto);
        echo json_encode($objRespuesta);
    }
    
}


if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["stock"]) && isset($_POST["valor"]) && isset($_POST["iva"]) && isset($_POST["idCategoria"]) && isset($_POST["codigo"])){
    $objTelefonos = new controlTelefonos();
    $objTelefonos->nombre = $_POST["nombre"];
    $objTelefonos->descripcion = $_POST["descripcion"];
    $objTelefonos->stock = $_POST["stock"];
    $objTelefonos->valor = $_POST["valor"];
    $objTelefonos->iva = $_POST["iva"];
    $objTelefonos->idCategoria = $_POST["idCategoria"];
    $objTelefonos->codigo = $_POST["codigo"];
    $objTelefonos->foto = $_FILES["foto"];
    $objTelefonos->ctrRegistrarTelefonos();
}

if (isset($_POST["cargarDatos"]) == "ok"){
    $objTelefonos = new controlTelefonos();
    $objTelefonos->ctrListarTelefonos();  
}


if (isset($_POST["editarNombre"]) && isset($_POST["editarDescripcion"]) && isset($_POST["editarStock"]) && isset($_POST["editarValor"]) && isset($_POST["editarIva"]) && isset($_POST["editarCodigo"]) && isset($_POST["editarIdCategoria"]) && isset($_POST["idProducto"])){
    $objTelefonos = new controlTelefonos();
    $objTelefonos->nombre = $_POST["editarNombre"];
    $objTelefonos->descripcion = $_POST["editarDescripcion"];
    $objTelefonos->stock = $_POST["editarStock"];
    $objTelefonos->valor = $_POST["editarValor"];
    $objTelefonos->iva = $_POST["editarIva"];
    $objTelefonos->idCategoria = $_POST["editarIdCategoria"];
    $objTelefonos->codigo = $_POST["editarCodigo"];
    $objTelefonos->idProducto = $_POST["idProducto"];
    $objTelefonos->ctrModificarTelefonos();
}

if (isset($_POST["eliminarProducto"]) && isset($_POST["url"])){
    $objTelefonos = new controlTelefonos();
    $objTelefonos->idProducto = $_POST["eliminarProducto"];
    $objTelefonos->foto = $_POST["url"];
    $objTelefonos->ctrEliminarTelefonos();
}