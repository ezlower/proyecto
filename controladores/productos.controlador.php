<?php
class ControladorProductos 

{

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

    static public function ctrMostrarProductos($item,$valor,$orden){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla,$item,$valor,$orden);

        return $respuesta;
    }

    /*=============================================
	AGREGAR PRODUCTOS
	=============================================*/

    static public function ctrCrearProducto(){
        if(isset($_POST["nuevoDescripcion"])){
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["nuevoDescripcion"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){

                    $ruta = "vistas/img/productos/default.jpg";

                    
                if ($_FILES["nuevaImagen"]["tmp_name"]) {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
                    //var_dump(getimagesize($_FILES["nuevaImagen"]["tmp_name"]));
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* CREAMOS DIRECTORIO DONDE SE GUARDARA LA FOTO */

                    $directorio = "vistas/img/productos/" . $_POST["nuevoCodigo"];

                    mkdir($directorio, 0755); //PERMISOS DE LECTURA Y ESCRITURA

                    /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */

                    if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/productos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaImagen"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/productos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                    $tabla = "productos";

                    $datos =  array(
                        "id_categoria" =>  $_POST["nuevaCategoria"],
                        "codigo" => $_POST["nuevoCodigo"],
                        "descripcion" =>  $_POST["nuevoDescripcion"],
                        "stock" => $_POST["nuevoStock"],
                        "precio_compra" => $_POST["nuevoPrecioCompra"],
                        "precio_venta" =>  $_POST["nuevoPrecioVenta"],
                        "imagen" => $ruta,
                    );

                    $respuesta = ModeloProductos::mdlIngresarProducto($tabla,$datos);
                    if ($respuesta == "ok") {

                        echo '<script>
    
                        swal({
    
                            type: "success",
    
                            title: "¡El producto ha sido guardado correctamente!",
    
                            showConfirmButton: true,
    
                            confirmButtonText: "Cerrar",
    
                            closeOnConfirm: false
    
                        }).then((result)=>{
    
                            if(result.value){
    
                                window.location = "productos";
    
                            }
                        });
                    
    
                    </script>';
                    }
                }else{
                    echo '<script>

					swal({

						type: "error",

						title: "¡El producto no puede ir con campos vacíos o llevar caracteres especiales!",

						showConfirmButton: true,

						confirmButtonText: "Cerrar",
                        
                        closeOnConfirm: false

					}).then((result)=>{
                        
                        if(result.value){

                            window.location = "productos";
                        }

                    });
				

				</script>';
                }
        }
    }



    /*=============================================
	EDITAR CATEGORIA
	=============================================*/

    static public function ctrEditarProducto(){
        if(isset($_POST["editarDescripcion"])){
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["editarDescripcion"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
                preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
                preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

                    
                    
                $ruta = $_POST["imagenActual"];

                if ($_FILES["editarImagen"]["tmp_name"] && !empty($_FILES["editarImagen"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
                    //var_dump(getimagesize($_FILES["nuevaImagen"]["tmp_name"]));
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* CREAMOS DIRECTORIO DONDE SE GUARDARA LA FOTO */

                    $directorio = "vistas/img/productos/" . $_POST["editarCodigo"];


                            // SE PREGUNTA SI EXISTE OTRA IMG EN LA BD
                    if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != 'vistas/img/productos/default.jpg'){
                        unlink($_POST["imagenActual"]);

                    }else{
                        mkdir($directorio, 0755); //PERMISOS DE LECTURA Y ESCRITURA
                    }          

                    /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */

                    if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/productos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarImagen"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/productos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                    $tabla = "productos";

                    $datos =  array(
                        "id_categoria" =>  $_POST["editarCategoria"],
                        "codigo" => $_POST["editarCodigo"],
                        "descripcion" =>  $_POST["editarDescripcion"],
                        "stock" => $_POST["editarStock"],
                        "precio_compra" => $_POST["editarPrecioCompra"],
                        "precio_venta" =>  $_POST["editarPrecioVenta"],
                        "imagen" => $ruta,
                    );

                    $respuesta = ModeloProductos::mdlEditarProducto($tabla,$datos);
                    if ($respuesta == "ok") {

                        echo '<script>

                        swal({

                            type: "success",

                            title: "¡El producto ha sido editado correctamente!",

                            showConfirmButton: true,

                            confirmButtonText: "Cerrar",

                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "productos";

                            }
                        });
                    

                    </script>';
                    }
                }else{
                    echo '<script>

                    swal({

                        type: "error",

                        title: "¡El producto no puede ir con campos vacíos o llevar caracteres especiales!",

                        showConfirmButton: true,

                        confirmButtonText: "Cerrar",
                        
                        closeOnConfirm: false

                    }).then((result)=>{
                        
                        if(result.value){

                            window.location = "productos";
                        }

                    });
                

                </script>';
                }
        }
    }   


/*=============================================
	ELIMINAR PRODUCTOS
	=============================================*/
    
    static public function ctrEliminarProducto(){
        if(isset($_GET["idProducto"])){
            $tabla = "productos";
            $datos = $_GET["idProducto"];

            if ($_GET["imagen"] != "" && $_GET["imagen"] != 'vistas/img/productos/default.jpg' ){
                unlink($_GET["imagen"]);
                rmdir('vistas/img/productos'.$_GET["codigo"]);
                
            }
            $respuesta = ModeloProductos::mdlEliminarProducto($tabla,$datos);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
                            type: "success",
                            title: "El producto ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                    if (result.value) {

                                    window.location = "productos";

                                    }
                                })

                    </script>';
            }
        }

    }

    /*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}


}