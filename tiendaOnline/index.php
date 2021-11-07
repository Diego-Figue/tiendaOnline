<?php

if (isset($_GET["lapTransactionState"]) == "APPROVED") {
}

require_once "controlador/plantillaControlador.php";
require_once "controlador/productosControlador.php";
require_once "modelo/productosModelo.php";

$objPlantilla = new controlPlantilla();
$objPlantilla->ctrPlantilla();
