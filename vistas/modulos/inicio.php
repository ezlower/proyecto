<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Tablero

            <small>Pagina de control</small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Tablero</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">


            <?php

            if ($_SESSION["perfil"] == "Administrador") {

                include "inicio/cajas-superiores.php";
            }


            ?>



        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                if ($_SESSION["perfil"] == "Administrador") {
                    include "reportes/graficos-ventas.php";
                }
                ?>
            </div>
            <div class="col-lg-6">
                <?php
                if ($_SESSION["perfil"] == "Administrador") {
                    include "reportes/productos-mas-vendidos.php";
                }
                ?>
            </div>

            <div class="col-lg-6">
                <?php
                if ($_SESSION["perfil"] == "Administrador") {
                    include "inicio/productos-recientes.php";
                }
                ?>
            </div>
            <div class="col-lg-12">
                <?php

                    if($_SESSION["perfil"] == "Vendedor" ||$_SESSION["perfil"] == "Especial"){
                    echo '
                    <div class="box box-success">

                        <div class="box-header">

                            <h1>Bienvenid@ '.$_SESSION["nombre"].'</h1>

                        </div>

                    </div>
                    
                    ';
                    }
                ?>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>