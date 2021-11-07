<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tienda Oline</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='vista/css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='vista/css/registrarTelefonos.css'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <!-- DataTables -->
    <!-- Por Defecto -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css'>
    <!-- Botones Exportacion-->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css'>
    
    <!-- ----------------------------------------------------------------------------------------------- -->
    <script src='vista/js/registrarTelefonos.js'></script>
    <script src='vista/js/main.js'></script>
    <script src='librerias/md5-min.js'></script>
    <script src='vista/js/compras.js'></script>
    <script src='vista/js/respuestaPayu.js'></script>

</head>

<body class="contenedor">

    <div class="jumbotron">
        <div class="container text-center">
            <h1 id="tituloH1">Tecno Store</h1>
        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="hoverMenu"><a href="inicio">Inicio</a></li>
                    <li class="hoverMenu"><a href="productos">Productos</a></li>
                    <li class="hoverMenu"><a href="registrarProductos">Reg.Pro</a></li>
                    <li class="hoverMenu"><a href="contactanos">Contactanos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hoverMenu"><a href="cuenta"><span class="glyphicon glyphicon-user"></span></a></li>
                    <li class="hoverMenu"><a href="compras"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>