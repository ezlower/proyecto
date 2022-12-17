<?php
if ($_SESSION["perfil"] == "Especial") {

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

            Clientes



        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Clientes</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">


        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
                    Agregar Cliente
                </button>

            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Fecha de nacimiento</th>
                            <th>Total Compras</th>
                            <th>Ultima compra</th>
                            <th>Ingreso al sistema</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $item = null;
                            $valor = null;

                            $clientes = ControladorClientes::ctrMostrarClientes($item,$valor);
                            foreach($clientes as $key => $value){
                                echo '
                                <tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["documento"].'</td>
                                    <td>'.$value["email"].'</td>
                                    <td>'.$value["telefono"].'</td>
                                    <td>'.$value["direccion"].'</td>
                                    <td>'.$value["fecha_nacimiento"].'</td>
                                    <td>'.$value["compras"].'</td>
                                    <td>'.$value["ultima_compra"].'</td>
                                    <td>'.$value["fecha"].'</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'" ><i class="fa fa-pencil"></i></button>';
                                            if ($_SESSION["perfil"] == "Administrador") {

                                echo '<button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id"] . '" ><i class="fa fa-times"></i></button>';
                                            
                                            }
                                        
                                            echo'</div>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                        



                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<!-- --------------------------------------- -->
<!-- VENTANA MODAL AGREGAR USUARIO -->
<!-- --------------------------------------- -->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="POST">

                <div class="modal-header" style="background:#3c8dbc;color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Cliente</h4>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" name="nuevoCliente" class="form-control input-lg" placeholder="Ingresar nombre" required>


                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ID -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="number" min="0" name="nuevoDocumentoId" class="form-control input-lg" placeholder="Ingresar documento" required>


                            </div>

                        </div>


                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" name="nuevoEmail" class="form-control input-lg" placeholder="Ingresar email" required>


                            </div>

                        </div>

                        <!-- ENTRADA PARA EL Telefono -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" name="nuevoTelefono" class="form-control input-lg" 
                                placeholder="Ingresar telefono" data-inputmask='"mask": "(999) 99999999"' data-mask required>


                            </div>

                        </div>



                        <!-- ENTRADA PARA LA DIRECCION -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" name="nuevaDireccion" class="form-control input-lg" 
                                placeholder="Ingresar direccion" required>


                            </div>

                        </div>


                        <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="text" name="nuevaFechaNacimiento" class="form-control input-lg" 
                                placeholder="Ingresar fecha de nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" 
                                data-mask required>


                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guargar cliente</button>

                </div>
                <?php
                $crearClientes = new ControladorClientes();
                $crearClientes->ctrCrearCliente();
                ?>
            </form>
        </div>

    </div>
</div>

<!-- --------------------------------------- -->
<!-- VENTANA MODAL EDITAR CLIENTE USUARIO -->
<!-- --------------------------------------- -->
<div id="modalEditarCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="POST">

                <div class="modal-header" style="background:#3c8dbc;color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Cliente</h4>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" name="editarCliente" id="editarCliente" class="form-control input-lg" required>
                                <input type="hidden" name="idCliente" id="idCliente">


                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ID -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="number" min="0" name="editarDocumentoId"id="editarDocumentoId" class="form-control input-lg"  required>


                            </div>

                        </div>


                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" name="editarEmail"id="editarEmail" class="form-control input-lg" required>


                            </div>

                        </div>

                        <!-- ENTRADA PARA EL Telefono -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" name="editarTelefono"id="editarTelefono" class="form-control input-lg" 
                                data-inputmask='"mask": "(999) 99999999"' data-mask required>


                            </div>

                        </div>



                        <!-- ENTRADA PARA LA DIRECCION -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" name="editarDireccion"id="editarDireccion" class="form-control input-lg" 
                                required>


                            </div>

                        </div>


                        <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="text" name="editarFechaNacimiento"id="editarFechaNacimiento" class="form-control input-lg" 
                                data-inputmask="'alias': 'yyyy/mm/dd'" 
                                data-mask required>


                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guargar cambios</button>

                </div>
                <?php
                $editarClientes = new ControladorClientes();
                $editarClientes->ctrEditarCliente();
                ?>
            </form>
        </div>

    </div>
</div>

<?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente -> ctrEliminarCliente();
?>