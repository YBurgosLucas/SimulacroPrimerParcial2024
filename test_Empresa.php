<?php
    include "Empresa.php";
    include "Cliente.php";
    include "Moto.php";
    include "Venta.php"; 
 
    $objtCliente1= new Cliente("juan", "gonzalez", "si", "dni", 123 );
    $objtCliente2= new Cliente( "yamel", "burgos", "no", "dni", 321 );
    $coleccionClientes=[$objtCliente1, $objtCliente2];

    $objtMoto1= new Moto( 11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
    $objtMoto2= new Moto( 12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
    $objtMoto3= new Moto( 13, 999900, 2023, "Zanella Patagonian Eagle 2050", 55, false);
    $coleccionMotos=[$objtMoto1,$objtMoto2,$objtMoto3];

    $colecVentasRealizadas=[];
    $objEmpresa= new Empresa( "Alta Gama", "Av.Argentina 123",$coleccionClientes ,$coleccionMotos ,$colecVentasRealizadas  );
    
    $colecCodigoMotos=[11,12,13];
    echo $objEmpresa."\n";
    echo "---------------------------------------------------------------\n";
    $importeTotal=$objEmpresa->registrarVenta($colecCodigoMotos, $objtCliente2);
        if ($importeTotal > 0){
            echo "El importe final de la compra es de $".$importeTotal."\n";
            echo "---------------------------------------------------------------\n";

        }
        else{
            echo "el monto de la Compra es de $0 no se logro encontrar el codigo moto o moto no disponible\n";
            echo "---------------------------------------------------------------\n"; 
            
        }
    
    $importeTotal2=$objEmpresa->registrarVenta($colecCodigoMotos[0], $objtCliente2);
        if ($importeTotal2 > 0){
            echo "El importe final de la compra es de $".$importeTotal2."\n";
            echo "---------------------------------------------------------------\n"; 

        }
        else{
            echo "el monto de la Compra es de $0 no se logro encontrar el codigo moto o moto no disponible\n";
            echo "---------------------------------------------------------------\n"; 

        }
    
    $importeTotal3=$objEmpresa->registrarVenta($colecCodigoMotos[2], $objtCliente2);
        if ($importeTotal3 > 0){
            echo "El importe final de la compra es de $".$importeTotal3."\n";
            echo "---------------------------------------------------------------\n"; 

        }
        else{
            echo "el monto de la Compra es de $0 no se logro encontrar el codigo moto o moto no disponible\n";
            echo "---------------------------------------------------------------\n"; 

        }

    $colecventas= $objEmpresa->retornarVentasXCliente("dni",123);
        foreach ($colecventas as $venta){
            echo "Las ventas realizadas mediante el nroDocumento son: ".$venta."\n";
            echo "---------------------------------------------------------------\n"; 
    
        }
    $colecventas= $objEmpresa->retornarVentasXCliente("dni",321);
        foreach ($colecventas as $venta){
            echo "Las ventas realizadas mediante el nroDocumento son: ".$venta."\n";
            echo "---------------------------------------------------------------\n"; 
        }
    
    echo $objEmpresa."\n";
    