$(document).ready(function () {

    var totalValor = 0;
    var totalCompra = 0;
    var ListaCompras = [];
    cargarCompra();
    calcularTotalValor();

    function cargarCompra() {

        if (localStorage.getItem("compras") != null) {

            ListaCompras = JSON.parse(localStorage.getItem("compras"));
            ListaCompras.forEach(visualizarProductos);

            function visualizarProductos(item, index) {

                var subTotal = (item.cantidadCompra * item.valor);
                var subValor = item.valor;

                var objBotones = '<button id="btnEliminarProducto" style="width:100%" class="btn btn-sm btn-danger" title="eliminar" idProducto="' + item.idProducto + '"><span class="glyphicon glyphicon-remove"></span></button> ';

                var interface = '<tr>';
                interface += '<td id="columnaBtnEliminar">' + objBotones + '</td>';
                interface += '<td style="text-align:center">' + item.nombre + '</td>';
                interface += '<td>  </td>';
                interface += '<td id="columnaCantidad" style="text-align:center"><input id="cantidad" style="width:100%" type="number" value="' + item.cantidadCompra + '" min="1" style="width:90px;"></td>';
                interface += '<td id="columnaPrecio" style="text-align:center">' + subValor + '</td>';
                interface += '<td id="columnaPrecioTotal" style="text-align:center">' + subTotal + '</td>';
                interface += '</tr>';

                totalValor += subValor;
                totalCompra += subTotal;

                $("#datos").append(interface);

            }

        }


        var interface = '<tr>';

        interface += '<td></td>';
        interface += '<td></td>';
        interface += '<td></td>';
        interface += '<td style="text-align:center"><h4>Total :</h4></td>';
        interface += '<td id="columnaValorCompra" style="text-align:center"><h4>' + totalValor + '</h4></td>';
        interface += '<td id="columnaTotalCompra" style="text-align:center"><h4>' + totalCompra + '</h4></td>';
        interface += '</tr>';

        $("#datos").append(interface);

    }

    //capturar foco de la caja numerica de cantidades

    $("#tablaCompra").on("change", "#cantidad", function () {

        var cantidad = $(this).val();
        var precio = $(this).parent().parent().children("#columnaPrecio").html();
        var subTotal = $(this).parent().parent().children("#columnaPrecioTotal").html(cantidad * precio);
        var idProducto = $(this).parent().parent().children("#columnaBtnEliminar").children("#btnEliminarProducto").attr("idProducto");

        ListaCompras.forEach(buscarProductosCompras);

        function buscarProductosCompras(item, index) {
            if (item.idProducto == idProducto) {
                item.cantidadCompra = Number(cantidad);
            }

        }

        localStorage.removeItem("compras");
        localStorage.setItem("compras", JSON.stringify(ListaCompras));

        calcularTotal();
    })

    function calcularTotal() {

        var subTotales = $("#tablaCompra #columnaPrecioTotal");
        var totalVenta = 0;

        for (let i = 0; i < subTotales.length; i++) {

            totalVenta += Number($(subTotales[i]).html());

        }

        $("#columnaTotalCompra").html('<h4>' + totalVenta + '</h4>');
        console.log(subTotales);
    }

    function calcularTotalValor() {

        var subValores = $("#tablaCompra #columnaPrecio");
        var totalVentaValores = 0;

        for (let i = 0; i < subValores.length; i++) {

            totalVentaValores += Number($(subValores[i]).html());

        }

        $("#columnaValorCompra").html('<h4>' + totalVentaValores + '</h4>');

    }

    $("#tablaCompra").on("click", "#btnEliminarProducto", function () {
        idProducto = $(this).attr("idProducto");
        var listaTemporal = [];

        ListaCompras.forEach(eliminarProducto);
        function eliminarProducto(item, index) {

            if (item.idProducto != idProducto) {

                listaTemporal.push({ "idProducto": item.idProducto, "nombre": item.nombre, "valor": item.valor, "stock": item.stock, "cantidadCompra": item.cantidadCompra });

            }

        }

        localStorage.removeItem("compras");
        localStorage.setItem("compras", JSON.stringify(listaTemporal));

        $("#datos").html("");
        totalCompra = 0;
        cargarCompra();
        calcularTotalValor();
    })

    $("#btnPagos").click(function () {

        $("#listado").html("");

        var acumuladoSubtotal = 0;
        var acumuladoEnvio = 0;
        var acumuladoIba = 0;
        var sumaTotalCompra = 0;
        var descripcionProductos = [];
        var indiceProductos = 0;

        var listaCompra = JSON.parse(localStorage.getItem("compras"));

        listaCompra.forEach(cargarListaCompra);

        function cargarListaCompra(item, index) {

            var subTotal = (item.cantidadCompra * item.valor);
            var envio = (subTotal * 0.05);
            acumuladoSubtotal += subTotal;
            acumuladoEnvio += subTotal;
            acumuladoEnvio += envio;
            acumuladoIba += (subTotal * 0.19);
            descripcionProductos[indiceProductos] = item.nombre;

            var interface = '<tr>';
            interface += '<td>' + item.nombre + '</td>';
            interface += '<td>' + item.cantidadCompra + '</td>';
            interface += '<td>' + subTotal + '</td>';
            interface += '</tr>';

            $("#listado").append(interface);
            indiceProductos += 1;

        }

        $("#colSubtotal").html("$ " + acumuladoSubtotal);
        $("#colValorEnvio").html("$ " + acumuladoEnvio);
        $("#colImpuesto").html("$ " + acumuladoIba);
        sumaTotalCompra = acumuladoSubtotal + acumuladoEnvio + acumuladoIba;
        $("#colTotalCompra").html("$ " + sumaTotalCompra);

        pagarPayU(descripcionProductos, acumuladoSubtotal, acumuladoEnvio, totalCompra, acumuladoIba);

    })

    function pagarPayU(descripcionProductos, acumuladoSubtotal, acumuladoEnvio, totalCompra, acumuladoIba) {

        var descripcion = descripcionProductos.toString();
        var productos = descripcion.replace(/,/g, "-");
        console.log(productos);

        var merchantId = "508029";
        var APILogin = "pRRXKOl8ikMmt9u";
        var APIKey = "4Vj8eK4rloUd272L48hsrarnUA";
        var accountId = "512321";
        var url = "https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/";
        var currency = "COP";
        var lng = "es";
        var refereceCode = Math.ceil(Math.random() * 1000000) + totalCompra;
        var amount = totalCompra;

        var signature = hex_md5(APIKey + "~" + merchantId + "~" + refereceCode + "~" + amount + "~" + currency);
        var taxReturnBase = (totalCompra - acumuladoIba);
        var displayShippingInformation = "YES";
        var test = 1;
        console.log(APIKey);
        console.log(merchantId);
        console.log(refereceCode);
        console.log(amount);
        console.log(currency);
        console.log(signature);
        console.log("f313c9cea681b07e40ac97b5391f4302");
        console.log("800e9a2f030e9acc5715c71e6b2e3bfe");

        $("#formPayu").attr("action", url);
        $("#formPayu input[name='merchantId']").attr("value", merchantId);
        $("#formPayu input[name='accountId']").attr("value", accountId);
        $("#formPayu input[name='description']").attr("value", productos);
        $("#formPayu input[name='referenceCode']").attr("value", refereceCode);
        $("#formPayu input[name='amount']").attr("value", amount);
        $("#formPayu input[name='tax']").attr("value", acumuladoIba);
        $("#formPayu input[name='taxReturnBase']").attr("value", taxReturnBase);
        $("#formPayu input[name='shipmentValue']").attr("value", acumuladoEnvio);
        $("#formPayu input[name='currency']").attr("value", currency);
        $("#formPayu input[name='lng']").attr("value", lng);
        $("#formPayu input[name='responseUrl']").attr("value", "http://localhost/tiendaOnline/inicio");
        $("#formPayu input[name='declinedResponseUrl']").attr("value", "http://localhost/tiendaOnline/rdeclinada");
        $("#formPayu input[name='displayShippingInformation']").attr("value", displayShippingInformation);
        $("#formPayu input[name='signature']").attr("value", signature);
        $("#formPayu input[name='test']").attr("value", test);

    }

})