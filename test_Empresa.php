<?php
    include "Empresa.php";
    include "Cliente.php";
    include "Moto.php";
    include "Venta.php"; 
 
    $objtCliente1= new Cliente("juan", "gonzalez", true, "dni", 123 );
    $objtCliente2= new Cliente( "yamel", "burgos", false, "dni", 321 );
    
    $objtMoto1= new Moto( 11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
    $objtMoto2= new Moto( 12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
    $objtMoto3= new Moto( 13, 999900, 2023, "Zanella Patagonian Eagle 2050", 55, false);
    
    $objEmpresa= new Empresa( "Alta Gama", "Av.Argentina 123", $coleccionClientes=[$objtCliente1, $objtCliente2], $coleccionMotos=[$objtMoto1,$objtMoto2,$objtMoto3], $colecVentasRealizadas=[] );
    $colecCodigoMotos=[11,12,13];
    $importeFinal=$objEmpresa->registrarVenta( $colecCodigoMotos, $objtCliente2);
    echo "Venta realizada el importe final de la compra es: $".$importeFinal;