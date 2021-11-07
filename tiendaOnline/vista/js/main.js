$(document).ready(function () {

    var listaFavoritos = [];
    var ListaCompras = [];

    // Seccion para cargar el localStorage y cargar info en los vectores

    if (localStorage.getItem("favoritos") != null) {
        var listaTemporalFavoritos = JSON.parse(localStorage.getItem("favoritos"));
        listaTemporalFavoritos.forEach(cargarVectorListaFavoritos);
    }

    function cargarVectorListaFavoritos(item, index) {
        listaFavoritos.push({});
    }

    if (localStorage.getItem("compras") != null) {
        var listaTemporalCompras = JSON.parse(localStorage.getItem("compras"));
        listaTemporalCompras.forEach(cargarVectorListaCompras);
    }

    function cargarVectorListaCompras(item, index) {
        ListaCompras.push({ "idProducto": item.idProducto, "nombre": item.nombre, "url": item.url, "valor": item.valor, "stock": item.   stock, "cantidadCompra":item.cantidadCompra });
    }

    $("#panelGeneral").on("click", "#btnFavoritos", function () {

        var id = $(this).attr("idProducto");
        var nombre = $(this).attr("nombre");
        var valor = $(this).attr("valor");
        var stock = $(this).attr("stock");

        alert(nombre);  

        swal({
            title: nombre,
            text: "$" + valor + " " + "Cantidad " + stock,
            icon: "info",
            button: "Aceptar",
        });

    })

    $("#panelGeneral").on("click", "#btnCompra", function () {

        var id = $(this).attr("idProducto");
        var nombre = $(this).attr("nombre");
        var valor = $(this).attr("valor");
        var stock = $(this).attr("stock");
        var cantidad = 1;
        var cantidadActual = 0;
        var hayProducto = false;

        ListaCompras.forEach(buscarProductos);

        function buscarProductos(item, index) {
            if (item.idProducto == id) {
                hayProducto = true;
                cantidadActual = Number(item.cantidadCompra);
                item.cantidadCompra = cantidadActual + cantidad;
            }

        }

        if (!hayProducto) {
            ListaCompras.push({ "idProducto": id, "nombre": nombre, "valor": valor, "stock": stock, "cantidadCompra":cantidad });
            localStorage.setItem("compras", JSON.stringify(ListaCompras));
            swal({
                title: "Buen Trabajo!",
                text: "Tu smartphone " + nombre + " ha sido agragado al carro de compras",
                icon: "success",
                button: "Aceptar",
            });
        }else{
            localStorage.removeItem("compras");
            localStorage.setItem("compras", JSON.stringify(ListaCompras));
            swal({
                title: "Buen Trabajo!",
                text: "Has agregado nuevamente tu smartphone " + nombre + " al carro de compras",
                icon: "success",
                button: "Aceptar",
            });
        }
    })
})