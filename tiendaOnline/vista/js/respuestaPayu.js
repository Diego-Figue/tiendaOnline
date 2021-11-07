$(document).ready(function () {

    var parametros = new URLSearchParams(location.search);
    var respuesta = parametros.get('lapTransactionState');
    alert(respuesta);

    if (respuesta == "APPROVED") {

        if (localStorage.getItem("compras") != null) {

            var listaCompra = localStorage.getItem("compras");

            objData = new FormData();
            objData.append("listaCompra", listaCompra);

            $.ajax({
                url: "controlador/inventarioControlador.php",
                type: "post",
                dataType: "json",
                data: objData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta){

                    alert(respuesta);

                    if(respuesta = "ok"){
                        localStorage.removeItem("compras");
                    }

                }

            })

        }

    }

})