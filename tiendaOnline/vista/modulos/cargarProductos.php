<div id="panelGeneral">
<?php

$objProductos = new controladorProductos();
$ListaProductos = $objProductos->ctrListarProductos();
$anteriorCategoria = "";
$categoria = "";


$interface = '';

foreach ($ListaProductos as $key => $value) {
    $categoria = $value["idCategoria"];
    if (empty($anteriorCategoria)){
        $anteriorCategoria = $categoria;
        $interface = '<div id="panelProductos" class="row mc-margenes">';
        $interface .= '<h1>Gama Alta</h1>';
    }
    
    if ($anteriorCategoria != $categoria){
        $interface .= '</div>';
        echo $interface;

        $anteriorCategoria = $categoria;
        $interface = '<div id="panelProductos" class="row mc-margenes">';
        $interface .= '<h1>Gama Media</h1>';
    }

    $ruta = "http://localhost/tiendaOnline/".$value["url"];
    $interface .= '<div class="col-sm-2">';
    $interface .= '<div class="panel panel-primary">';
    $interface .= '<div class="panel-heading">'.$value["nombre"].'</div>';
    $interface .= '<div class="panel-body"><img src="'.$ruta.'" class="img-responsive" style="width:100%" alt="Image"></div>';
    $interface .= '<div class="panel-footer">';

    $interface .= '<p class="mc-contenedorPrecios">'.'$'.$value["valor"].'</p>';
    $interface .= '<a id="btnCompra" class="mc-links pull-right" idProducto="'.$value["idProducto"].'" nombre="'.$value["nombre"].'" valor="'.$value["valor"].'" stock="'.$value["stock"].'" ><span class="glyphicon glyphicon-shopping-cart mc-iconos"></span></a>';
    $interface .= '<a class="mc-links pull-right" ><span class="glyphicon glyphicon-eye-open mc-iconos"></span></a>';
    $interface .= '<a id="btnFavoritos"class="mc-links pull-right"  idProducto="'.$value["idProducto"].'" nombre="'.$value["nombre"].'" valor="'.$value["valor"].'" stock="'.$value["stock"].'"><span class="glyphicon glyphicon-heart mc-iconos"></span></a>';
    

    $interface .= '</div>';
    
    $interface .= '</div>';
    $interface .= '</div>';
}

$interface .= '</div>';
echo $interface;
?>
</div>


<!-- // $objProductos = new controladorProductos();
// $listaProductos = $objProductos->ctrListarProductos();
// $categoriaAnterior = 0;
// $categoriaActual = 0;
// $titulosCategoria = array(
//     1 => '<div class="container">
//             <div class="row">
//                 <div class="col-sm-12">
//                     <div class="well">
//                         <h4>Telefonos Gama Alta</h4>
//                         </div>
//                     </div>
//                 </div>',
            
//     2 => '<div class="container">
//             <div class="row">
//                 <div class="col-sm-12">
//                     <div class="well">
//                         <h4>Telefonos Gama Media</h4>
//                         </div>
//                     </div>
//                 </div>',
// );

// $concatenar = "";
// $resultado = "";
// $valor = "http://localhost/tiendaOnline/";

// $contador = 0;
// $cantidadRegistros = 0;

// foreach ($listaProductos as $key => $value) {
//     $cantidadRegistros++;
// }

// $contadorProductos = 0;




// foreach ($listaProductos as $key => $value) {

//     $contadorProductos++;


//     if ($categoriaAnterior == 0) {
//         $categoriaAnterior = $value["idCategoria"];
//         $concatenar .= $titulosCategoria[$value["idCategoria"]];
//         $concatenar .= '<div class="row mc-margene">';
//     }
//     $categoriaActual = $value["idCategoria"];



//     if ($categoriaActual == $categoriaAnterior) {
//         $concatenar .= '<div class="col-sm-3">';
//         $concatenar .= '<div class="panel">';
//         $concatenar .= '<div class="panel panel-heading">' . $value["nombre"] . '</div>';

//         $concatenar .= '<div class="panel-body"><img class="imgProducto" src="' . $valor . $value["url"] . '" class="img-responsive" style="width:100%" alt="Image"></div>';
//         $concatenar .= '<div class="panel-footer">' . 'Precio' . " $" . $value["valor"] .'<br>' . 'Descripcion' . " " . $value["descripcion"] . '</div>';
//         $concatenar .= '</div>';
//         $concatenar .= '</div>';


//         $contador++;
//     } else{
//         $concatenar .= '</div>';
//         $categoriaAnterior = $value["idCategoria"];
//         $concatenar .= $titulosCategoria[$value["idCategoria"]];


//         $concatenar .= '<div class="row mc-margene">';
//         $concatenar .= '<div class="col-sm-3">';
//         $concatenar .= '<div class="panel">';
//         $concatenar .= '<div class="panel-heading">' . $value["nombre"] . '</div>';

//         $concatenar .= '<div class="panel-body"><img class="imgProducto" src="' . $valor . $value["url"] . '" class="img-responsive" style="width:100%" alt="Image"></div>';
//         $concatenar .= '<div class="panel-footer">' . 'Precio' . " $" . $value["valor"] .'<br>'. 'Descripcion' . " " . $value["descripcion"] . '</div>';
//         $concatenar .= '</div>';
//         $concatenar .= '</div>';


//         $contador = 1;
//     }
   
//     if ($contador == 5) {
//         $concatenar .= "</div>";
//         $concatenar .= "</div>";
//         $concatenar .= '<div class="row mc-margene">';
//         $contador = 0;
//     }

//     if ($contadorProductos == $cantidadRegistros) {
//         $concatenar .= "</div>";
//         $concatenar .= "</div>";
//         $concatenar .= "</div>";
        
//     }
// }


// echo $concatenar; -->
