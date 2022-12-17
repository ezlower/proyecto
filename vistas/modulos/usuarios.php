<?php
if ($_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Especial") {

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
            Administrar usuarios

        </h1>

        <ol class="breadcrumb">

            <li><a href="usuarios"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar usuarios</li>

        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle='modal' data-target='#modalAgregarUsuario'>
                    Agregar Usuario
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Cargo</th>
                            <th>Estado</th>
                            <th>Ultimo Login</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;
                        $i = 1;
                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                        foreach ($usuarios as $key => $value) {
                            echo '
                                <tr>
                                <td>' . ($key + 1) . '</td>
                                <td>' . $value["nombre"] . '</td>
                                <td>' . $value["usuario"] . '</td>
                            ';

                            if ($value["foto"] != "") {
                                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                            } else {
                                echo '<td><img src="vistas/img/usuarios/default/avatar.png" class="img-thumbnail" width="40px"></td>';
                            }




                            echo '<td>' . $value["perfil"] . '</td>';

                            if ($value["estado"] != 0) {
                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                            } else {
                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                            }




                            echo '<td>' . $value["ultimo_login"] . '</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '"data-toggle="modal" data-target="#modalEditarUsuario">
                                        <i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '">
                                        <i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>';
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </section>

</div>

<!-- MODAL AGREGAR USUARIOS -->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="POST" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00c0ef; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Usuario</h4>

                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese Nombre" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingrese Usuario" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA PASSWORD -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingrese Contraseña" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR PERFIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <select class="form-control input-lg" name="nuevoPerfil">

                                    <option value="">Seleccionar Perfil</option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Especial">Especial</option>

                                    <option value="Vendedor">Vendedor</option>

                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" name="nuevaFoto" class="nuevaFoto">

                            <p class="help-block">Peso maximo de la foto 2Mb</p>

                            <img src="vistas/img/usuarios/default/avatar.png" class="img-thumbnail previsualizar" width="100px" alt="">

                        </div>

                    </div>
                    <!-- FIN ./BOX BODY -->

                </div>
                <!-- FIN MODAL BODY -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

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