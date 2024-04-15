<?php
    include "Empresa.php";
    include "Cliente.php";
    include "Moto.php";
    include "Venta.php"; 
 
    $objtCliente1= new Cliente("juan", "gonzalez", true, "dni", 123 );
    $objtCliente2= new Cliente( "yamel", "burgos", false, "dni", 321 );
    $coleccionClientes=[$objtCliente1, $objtCliente2];

    $objtMoto1= new Moto( 11, 2230000, 2022, "Benelli Imperiale 400", 85, "true");
    $objtMoto2= new Moto( 12, 584000, 2021, "Zanella Zr 150 Ohc", 70, "true");
    $objtMoto3= new Moto( 13, 999900, 2023, "Zanella Patagonian Eagle 2050", 55, "false");
    $coleccionMotos=[$objtMoto1,$objtMoto2,$objtMoto3];
    
    $colecVentasRealizadas=[];
    $objEmpresa= new Empresa( "Alta Gama", "Av.Argentina 123",$coleccionClientes ,$coleccionMotos ,$colecVentasRealizadas  );
    $colecCodigoMotos=[11,12,13];
 
    echo $objEmpresa."\n";
   