<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";



class TablaProductosVentas
{

    // MOSTRAR TABLA PRODUCTOS
    public function mostrarTablaProductosVentas()
    {

        $item = null;
        $valor = null;
        $orden = "id";

        $productos = ControladorProductos::ctrMostrarProductos($item,$valor,$orden);

       // $imagen = "<img src='vistas/img/productos/default.jpg' width='40px'>";
        
        
//var_dump($productos);
        $datosJson = '{

            
            "data": [ ';
            for($i = 0;$i< count($productos);$i++){
                
                $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";
            



                // STOCK

                if($productos[$i]["stock"] <= 50){
                    $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";        
                }else if($productos[$i]["stock"] > 50 && $productos[$i]["stock"] <= 130){
                    $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";        
                }else{
                    $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
                }

                $botones ="<div class='btn-group'> <button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";


                $datosJson .='[
                    "'.($i+1).'",
                    "'.$imagen.'",
                    "'.$productos[$i]["codigo"].'",
                    "'.$productos[$i]["descripcion"].'",
                    "'.$stock.'",
                    "'.$botones.'"
    
                ],';

            }
            $datosJson = substr($datosJson,0,-1);
            $datosJson .= '] 
        }';

        echo $datosJson;       

    }
}
// ACTIVAR TABLA DE PRODUCTOS

$activarProductosVentas  = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();
