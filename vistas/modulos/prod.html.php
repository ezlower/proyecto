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
                <table class="table table-bordered table-striped dt-responsive tablas" width='100%'>
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
                        <!-- <?php
                    $item = null;
                    $valor = null;
                    $productos = ControladorProductos::ctrMostrarProductos($item,$valor);


                        foreach($productos as $key => $value){
                            echo '
                                <tr>
                                    <td>'.($key + 1).'</td>';

                                    if($value["imagen"] != ""){
                                        echo '<td><img src="' . $value["imagen"] . '" class="img-thumbnail" width="40px"></td>';
                                    }else{
                                        echo '<td><img src="vistas/img/productos/default.jpg" class="img-thumbnail" width="40px"></td>';
                                    }
                            echo '  <td><img src="vistas/img/productos/default.jpg" alt="" class="img-tumbnail" width="40px"></td>
                                    <td>'.$value["codigo"].'</td>
                                    <td>'.$value["descripcion"].'</td>';

                                    $item = "id";
                                    $valor = $value["id_categoria"];
                                    $categoria = ControladorCategorias::ctrMostrarCategorias($item,$valor);


                            echo '
                                    
                                    <td>'.$categoria["categoria"].'</td>
                                    <td>'.$value["stock"].'</td>
                                    <td>$'.$value["precio_compra"].'</td>
                                    <td>$'.$value["precio_venta"].'</td>
                                    <td>'.$value["fecha"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarProducto" id=""><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnEliminarProducto" id=""><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            ';
                        }
                    ?>
                         -->

                    </tbody>
                </table>
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
                        <!-- ENTRADA PARA EL CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar codigo" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL DESCRIPCION -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoDescripcion" id="nuevoDescripcion" placeholder="Ingrese Descripcion" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" name="nuevoCategoria">

                                    <option value="">Seleccionar categoria</option>

                                    <option value="Golocinas">Golocinas</option>

                                    <option value="Gaseosas">Gaseosas</option>

                                    <option value="Detergentes">Detergentes</option>

                                </select>
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

                            <div class="col-xs-6">

                                <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" id="nuevoPrecioCompra" min="0" placeholder="Ingrese Precio de Compra" required>
                                </div>

                            </div>

                            <!-- ENTRADA PARA EL PRECIO DE VENTA -->
                            <div class="col-xs-6">
                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" id="nuevoPrecioVenta" min="0" placeholder="Ingrese Precio de Venta" required>
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
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();
                ?>

            </form>
        </div>

    </div>
</div>

<!-- MODAL EDITAR USUARIOS -->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="POST" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00c0ef; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Usuario</h4>

                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA PASSWORD -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
                                <input type="hidden" name="passwordActual" id="passwordActual">
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR PERFIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <select class="form-control input-lg" name="editarPerfil">

                                    <option value="" id="editarPerfil"></option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Especial">Especial</option>

                                    <option value="Vendedor">Vendedor</option>

                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" name="editarFoto" class="nuevaFoto">

                            <p class="help-block">Peso maximo de la foto 2Mb</p>

                            <img src="vistas/img/usuarios/default/avatar.png" class="img-thumbnail previsualizar" width="100px" alt="">
                            <input type="hidden" name="fotoActual" id="fotoActual">

                        </div>

                    </div>
                    <!-- FIN ./BOX BODY -->

                </div>
                <!-- FIN MODAL BODY -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar usuario</button>

                </div>

                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();
                ?>

            </form>
        </div>

    </div>
</div>
<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();
?>