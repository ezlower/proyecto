<?php

require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";


require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

class imprimirFactura
{
    public $codigo;


    public function traerImpresionFactura()
    {

        // informacion de la venta
        $itemVenta = "codigo";
        $valorVenta = $this->codigo;

        $respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

        $fecha = substr($respuestaVenta["fecha"], 0, -8);
        $productos = json_decode($respuestaVenta["productos"], true);
        $neto = number_format($respuestaVenta["neto"], 2);
        $impuesto = number_format($respuestaVenta["impuesto"], 2);
        $total = number_format($respuestaVenta["total"], 2);




        // informacion del cliente
        $itemCliente = "id";
        $valorCliente = $respuestaVenta["id_cliente"];

        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);


        // informacion del vendedor

        $itemVendedor = "id";
        $valorVendedor = $respuestaVenta["id_vendedor"];

        $respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

        // Include the main TCPDF library (search for installation path).
        require_once('tcpdf_include.php');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf->startPageGroup();
        $pdf->AddPage();

        //--------------------------------------------------------------------------

        $bloque1 = <<<EOF

        <table>
            <tr>

                <td style="width:150px"><img src="images/img1.png"></td>
                <td style="background-color:white; width:140px">
                    <div style="font-size:8.5px; text-align:right; line-height:15px">

                        <br>
                        NIT: 229542023

                        <br>
                        Direccion: Calle Juan Balsa 5014
                    </div>
                
                </td>

                <td style="background-color:white; width:140px">
                    <div style="font-size:8.5px; text-align:right; line-height:15px">

                        <br>
                        TELEFONO: 68991222

                        <br>
                        distruidoraCopa@gmail.com
                    </div>
                
                </td>

                <td style="background-color:white; width:110px; text-align:center; color:red"><br>
                    <br>FACTURA N.<br>$valorVenta
                
                </td>

            </tr>
        </table?

EOF;


        $pdf->writeHTML($bloque1, false, false, false, false, '');
        //----------------------FIN BLOQUE 1--------------------------

        $bloque2 = <<<EOF

        <table style="font-size:10px; padding:5px 10px;">
        
            <tr>

                <td style="border:1px solid #666; background-color:white; width:390px">

                    Cliente: $respuestaCliente[nombre]

                </td>


                <td style="border:1px solid #666; background-color:white; width:150;
                text-align:right">

                    Fecha: $fecha

                </td>
            </tr>
        
        </table>


EOF;

            $pdf->writeHTML($bloque2, false, false, false, false, '');
            //----------------------FIN BLOQUE 2--------------------------

        //-------------------------------------------------------------

        
        $bloque3 = <<<EOF

        <table style="font-size:10px; padding:5px 10px;">
        
            <tr>

                <td style="border:1px solid #666; background-color:white; width:540px">

                    Vendedor: $respuestaVendedor[nombre]

                </td>


                
            </tr>
        
        </table>


EOF;

            $pdf->writeHTML($bloque3, false, false, false, false, '');
            //----------------------FIN BLOQUE 2--------------------------
        // Close and output PDF document
// This method has several options, check the source code documentation for more information.
        $pdf->Output('factura.pdf');

    }


}
$factura = new imprimirFactura();
$factura->codigo = $_GET["codigo"];
$factura->traerImpresionFactura();


?>