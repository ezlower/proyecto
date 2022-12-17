<?php
if ($_SESSION["perfil"] == "Vendedor") {

    echo '
        <script>
            window.location = "inicio";
        </script>
    ';
    return;
}
?>


<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar productos

        </h1>

        <ol class="breadcrumb">

            <li><a href="productos"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar productos</li>

        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle='modal' data-target='#modalAgregarProducto'>
                    Agregar Producto
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaProductos" width='100%'>
                    <thead>



                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Imagen</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                </table>

                <input type="hidden" value="<?php echo $_SESSION["perfil"]; ?>" id="perfilOculto">
            </div>
            <!-- /.box-body -->
        </div>

    </section>

</div>

<!-- MODAL AGREGAR PRODUCTOS -->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="POST" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00c0ef; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Producto</h4>

                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" required>

                                    <option value="">Seleccionar categoria</option>


                                    <?php

                                    $item = null;

                                    $valor = null;

                                    $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

                                    foreach ($categorias as $key => $value) {
                                        echo'<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                                    }
                                    ?>

                                    

                                </select>
                            </div>
                        </div>


                        <!-- ENTRADA PARA EL CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo" placeholder="Ingresar codigo" readonly>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL DESCRIPCION -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoDescripcion" id="nuevoDescripcion" placeholder="Ingrese Descripcion" required>
                            </div>
                        </div>



                        <!-- ENTRADA PARA EL STOCK -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg" name="nuevoStock" id="nuevoStock" min="0" placeholder="Ingrese Stock" required>
                            </div>
                        </div>



                        <div class="form-group row">

                            <div class="col-xs-12 col-sm-6">

                                <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" 
                                    id="nuevoPrecioCompra" min="0" step="any"
                                    placeholder="Ingrese Precio de Compra" required>
                                </div>

                            </div>

                            <!-- ENTRADA PARA EL PRECIO DE VENTA -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" 
                                    id="nuevoPrecioVenta" min="0" step="any"
                                    placeholder="Ingrese Precio de Venta" required>
                                </div>

                                <br>

                                <!-- CHECKBOX PARA PORCENTAJE -->


                                <div class="col-xs-6">

                                    <div class="form-group">

                                        <label for="">

                                            <input type="checkbox" name="" id="" class="minimal porcentaje" checked>
                                            Utilizar Porcentaje

                                        </label>

                                    </div>
                                </div>

                                <!-- ENTRADA PARA PORCENTAJE -->

                                <div class="col-xs-6" style="padding: 0">

                                    <div class="input-group">

                                        <input type="number" name="" id="" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="form-group">

                            <div class="panel">SUBIR IMAGEN</div>

                            <input type="file" name="nuevaImagen" class="nuevaImagen">

                            <p class="help-block">Peso maximo de la Imagen 2Mb</p>

                            <img src="vistas/img/productos/default.jpg" class="img-thumbnail previsualizar" width="100px" alt="">

                        </div>

                    </div>
                    <!-- FIN ./BOX BODY -->

                </div>
                <!-- FIN MODAL BODY -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar producto</button>

                </div>

                <?php
                $crearProducto = new ControladorProductos();
                $crearProducto->ctrCrearProducto();
                ?>

            </form>
        </div>

    </div>
</div>


<!-- MODAL EDITAR PRODUCTOS -->

<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="POST" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00c0ef; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Producto</h4>

                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" name="editarCategoria" readonly required>

                                    <option id="editarCategoria" >Seleccionar categoria</option>


                                
                                    

                                </select>
                            </div>
                        </div>


                        <!-- ENTRADA PARA EL CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" readonly>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL DESCRIPCION -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                            </div>
                        </div>



                        <!-- ENTRADA PARA EL STOCK -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" min="0" required>
                            </div>
                        </div>



                        <div class="form-group row">

                            <div class="col-xs-12 col-sm-6">

                                <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarPrecioCompra" 
                                    id="editarPrecioCompra" min="0" step="any" required>
                                </div>

                            </div>

                            <!-- ENTRADA PARA EL PRECIO DE VENTA -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarPrecioVenta" id="editarPrecioVenta" min="0" step="any"
                                    readonly required>
                                </div>

                                <br>

                                <!-- CHECKBOX PARA PORCENTAJE -->


                                <div class="col-xs-6">

                                    <div class="form-group">

                                        <label for="">

                                            <input type="checkbox" name="" id="" class="minimal porcentaje" checked>
                                            Utilizar Porcentaje

                                        </label>

                                    </div>
                                </div>

                                <!-- ENTRADA PARA PORCENTAJE -->

                                <div class="col-xs-6" style="padding: 0">

                                    <div class="input-group">

                                        <input type="number" name="" id="" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="form-group">

                            <div class="panel">SUBIR IMAGEN</div>

                            <input type="file" name="editarImagen" class="nuevaImagen">

                            <p class="help-block">Peso maximo de la Imagen 2Mb</p>

                            <img src="vistas/img/productos/default.jpg" class="img-thumbnail previsualizar" width="100px" alt="">

                            <input type="hidden" name="imagenActual" id="imagenActual>

                        </div>

                    </div>
                    <!-- FIN ./BOX BODY -->

                </div>
                <!-- FIN MODAL BODY -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

                

            </form>

            <?php

            $editarProducto = new ControladorProductos();
            $editarProducto -> ctrEditarProducto();
            ?>
        </div>

    </div>
</div>
<?php
$eliminarProducto = new ControladorProductos();
$eliminarProducto -> ctrEliminarProducto();
?>
