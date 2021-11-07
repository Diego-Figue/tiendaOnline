<div id="listaCompra">

    <div class="container">

        <div class="col-md-12">

            <table class="table table-bordered" id="tablaCompra">

                <thead>

                    <th style="text-align:center">Eliminar</th>
                    <th style="text-align:center">Nombre</th>
                    <th style="text-align:center">Imagen</th>
                    <th style="text-align:center">Cantidad Compra</th>
                    <th style="text-align:center">Valor</th>
                    <th style="text-align:center">Total</th>

                </thead>

                <tbody id="datos">

                    <tr>


                    </tr>

                <tbody>

            </table>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-3">
        <button id="btnPagos" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Pagar</button>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Resumen Compra</h4>
                </div>

                <div class="modal-body">
                    <div id="contenidoCheckout">
                        <div class="row">
                            <h5 class="text-center well text-muted text-uppercase">Información de pago</h5>

                            <figure class="col-md-12">
                                <center>
                                    <img src="vista/img/mediosPagos.jpeg" class="img thumbnail">
                                </center>
                            </figure>

                        </div>


                        <br>

                        <div class="listaProductos row">
                            <h5 class="text-center well text-muted text-uppercase">Productos a comprar</h5>

                            <table class="table table-bordered tablaProductos">

                                <thead>

                                    <tr>
                                        <td>Proucto</td>
                                        <td>Cantidad</td>
                                        <td>Subtotal</td>
                                    </tr>

                                </thead>

                                <tbody id="listado">

                                </tbody>


                            </table>
                            <div class="col-sm-6 col-xs-12 pull-right">
                                <table class="table table-bordered tablaProductos">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal:</td>
                                            <td id="colSubtotal"></td>

                                        </tr>
                                        <tr>
                                            <td>Envio:</td>
                                            <td id="colValorEnvio"></td>

                                        </tr>
                                        <tr>
                                            <td>Impuesto</td>
                                            <td id="colImpuesto"></td>

                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td id="colTotalCompra"></td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>


                        </div>

                    </div>


                </div>

                <div class="modal-footer">
                    <form id="formPayu" method="post" action="">
                        <input name="merchantId" type="hidden" value="">
                        <input name="accountId" type="hidden" value="">
                        <input name="description" type="hidden" value="">
                        <input name="referenceCode" type="hidden" value="">
                        <input name="amount" type="hidden" value="">
                        <input name="tax" type="hidden" value="">
                        <input name="taxReturnBase" type="hidden" value="">
                        <input name="shipmentValue" type="hidden" value="">
                        <input name="currency" type="hidden" value="">
                        <input name="lng" type="hidden" value="">
                        <!-- <input name="confirmationUrl" type="hidden" value=""> -->
                        <input name="responseUrl" type="hidden" value="">
                        <input name="declinedResponseUrl" type="hidden" value="">
                        <input name="displayShippingInformation" type="hidden" value="">
                        <input name="signature" type="hidden" value="">
                        <input name="test" type="hidden" value="">
                        <input name="Submit" class="btn btn-block btn-lg btn-primary" type="submit" value="PAGAR">
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>