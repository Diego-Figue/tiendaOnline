<?php

require_once "../modelo/inventarioModelo.php";

class controladorInventario
{

    public $lista;

    public function ctrActualizarStock()
    {
        $objRespuesta = modeloInventario::mdlActualizarStock($this->lista);
        echo json_encode($objRespuesta);
    }
}

if (isset($_POST["listaCompra"])) {

    $objInvetario = new controladorInventario();
    $objInvetario->lista = json_decode($_POST["listaCompra"]);
    $objInvetario->ctrActualizarStock();
}
