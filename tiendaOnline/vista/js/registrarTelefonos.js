$(document).ready(function () {

    cargarTelefonos();

    $("#btnRegTelefonos").show();
    $("#btnModTelefonos").hide();

    $("#btnRegTelefonos").click(function () {
        var nombre = $("#txtNombre").val();
        var descripcion = $("#txtDescripcion").val();
        var stock = $("#txtStock").val();
        var valor = $("#txtValor").val();
        var iva = $("#txtIva").val();
        var idCategoria = $("#seleccionarCategoria").val();
        var codigo = $("#txtCodigo").val();
        var foto = document.getElementById("txtFoto").files[0];

        var objData = new FormData();
        objData.append("nombre", nombre);
        objData.append("descripcion", descripcion);
        objData.append("stock", stock);
        objData.append("valor", valor);
        objData.append("iva", iva);
        objData.append("idCategoria", idCategoria);
        objData.append("codigo", codigo);
        objData.append("foto", foto);

        $.ajax({
            url: "controlador/telefonosControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta == "ok") {
                    cargarTelefonos();
                    blanquear();
                    swal({
                        title: "Buen Trabajo!",
                        text: "Telefono registrado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    iniciarTabla();
                    cargarTelefonos();
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }
        })

    })

    function cargarTelefonos() {
        var cargarDatos = "ok";
        var objData = new FormData();
        objData.append("cargarDatos", cargarDatos);
        $.ajax({
            url: "controlador/telefonosControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                var dataSet = [];
                var contadorFilas = 0;
                respuesta.forEach(cargarLista);


                function cargarLista(item, index) {
                    contadorFilas += 1;

                    var interface = '<td><img src="' + item.url + '"high="70" width="80"></td>';

                    var objBotones = '<button id="btnEditarTelefono" type="button" class="btn btn-warning" title="editar" idProducto="' + item.idProducto + '" nombre="' + item.nombre + '" descripcion="' + item.descripcion + '" stock="' + item.stock + '" valor="' + item.valor + '" iva="' + item.iva + '" idCategoria="' + item.idCategoria + '" codigo="' + item.codigo + '" url="' + item.url + '" ><span class="glyphicon glyphicon-pencil"></span></button>';
                    objBotones += '<button id="btnEliminarTelefono" type="button" class="btn btn-danger" title="eliminar" idProducto="' + item.idProducto + '" url="' + item.url + '"><span class="glyphicon glyphicon-remove"></span></button>';

                    dataSet.push([contadorFilas, item.nombre, item.descripcion, item.stock, item.valor, item.iva, item.codigo, interface, objBotones]);

                }

                $('#tablaTelefono').DataTable({
                    data: dataSet,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                        'colvis'
                    ],

                    language: {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 of de registros",
                        "infoFiltered": "(Filtrado de _MAX_ total registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });
            }


        })
    }

    function iniciarTabla() {

        var tabla = $("#tablaTelefono").DataTable();
        tabla.destroy();

    }

    $("#tablaTelefono").on("click", "#btnEditarTelefono", function () {

        $("#btnModTelefonos").show();

        var nombre = $(this).attr("nombre");
        var descripcion = $(this).attr("descripcion");
        var stock = $(this).attr("stock");
        var valor = $(this).attr("valor");
        var iva = $(this).attr("iva");
        var idCategoria = $(this).attr("idCategoria");
        var codigo = $(this).attr("codigo");
        var idProducto = $(this).attr("idProducto");

        $("#txtNombre").val(nombre);
        $("#txtDescripcion").val(descripcion);
        $("#txtStock").val(stock);
        $("#txtValor").val(valor);
        $("#txtIva").val(iva);
        $("#seleccionarCategoria").val(idCategoria);
        $("#txtCodigo").val(codigo);
        $("#btnModTelefonos").attr("producto", idProducto);



        $("#btnRegTelefonos").hide();

    })

    $("#btnModTelefonos").click(function () {

        var nombre = $("#txtNombre").val();
        var descripcion = $("#txtDescripcion").val();
        var stock = $("#txtStock").val();
        var valor = $("#txtValor").val();
        var iva = $("#txtIva").val();
        var idCategoria = $("#seleccionarCategoria").val();
        var codigo = $("#txtCodigo").val();
        var idProducto = $(this).attr("producto");

        var objData = new FormData();
        objData.append("editarNombre", nombre);
        objData.append("editarDescripcion", descripcion);
        objData.append("editarStock", stock);
        objData.append("editarValor", valor);
        objData.append("editarIva", iva);
        objData.append("editarIdCategoria", idCategoria);
        objData.append("editarCodigo", codigo);
        objData.append("idProducto", idProducto);

        $.ajax({
            url: "controlador/telefonosControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta == "ok") {
                    cargarTelefonos();
                    blanquear();
                    $("#btnRegTelefonos").show();
                    $("#btnModTelefonos").hide();
                    swal({
                        title: "Buen Trabajo!",
                        text: "Telefono modificado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    iniciarTabla();
                    cargarTelefonos();
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }

        })

    })

    $("#tablaTelefono").on("click", "#btnEliminarTelefono", function () {
        swal({
            title: "¿Desea Eliminar Este Registro?",
            text: "¡Una vez eliminado no se podra recuperar el registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var idProducto = $(this).attr("idProducto");
                    var foto = $(this).attr("url");

                    var objData = new FormData();
                    objData.append("eliminarProducto", idProducto);
                    objData.append("url", foto);



                    $.ajax({
                        url: "controlador/telefonosControlador.php",
                        type: "post",
                        dataType: "json",
                        data: objData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respuesta) {
                            if (respuesta == "ok") {
                                swal("¡Se ha eliminado correactamente!", {
                                    icon: "success",
                                });
                                iniciarTabla();
                                cargarTelefonos();

                            }
                        }
                    })

                } else {
                    swal("¡Tu registro esta a salvo!");
                }
            });
    })

    function blanquear() {

        $("#txtNombre").val("");
        $("#txtDescripcion").val("");
        $("#txtStock").val("");
        $("#txtValor").val("");
        $("#txtIva").val("");
        $("#txtCodigo").val("");
        $("#txtFoto").val("");
        $("#seleccionarCategoria").val("");
    }
})
