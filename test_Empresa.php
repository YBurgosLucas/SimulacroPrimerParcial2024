<?php
include "Cliente.php";
include "Moto.php";
include "Venta.php";
include "Empresa.php";

$objCliente1= new Cliente("yamel", "burgos", "no", "dni", 123);
$objCliente2= new Cliente("juan", "gonzalez", "no", "dni", 321);
$colecClientes=[$objCliente1, $objCliente2];

$objMoto1= new Moto(11, 223000, 2022, "Benelli Imperiale 400", 85, true );
$objMoto2= new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc ", 70, true );
$objMoto3= new moto(13, 9999000, 2023, "Zanella Patagonian Eagle 250", 55, false );
$colecMotos=[$objMoto1, $objMoto2, $objMoto3];

$colecVentas=[];
$objEmpresa=new Empresa("Alta Gama", "Av.Argentina 123",  $colecClientes, $colecMotos, $colecVentas);

$colCodigoMotos=[11,12, 13];
$preciofinal=$objEmpresa->registrarVenta($colCodigoMotos, $objCliente2);
if($preciofinal >0){

    echo "venta realizada el costo final es de $".$preciofinal."\n";
    echo "***********************************************************\n";
}
else{
    echo "Venta no realizada\n";
    echo "***********************************************************\n";
}

$preciofinal=$objEmpresa->registrarVenta($colCodigoMotos[0], $objCliente2);
if($preciofinal >0){

    echo "venta realizada el costo final es de $".$preciofinal."\n";
}
else{
    echo "Venta no realizada\n";
    echo "***********************************************************\n";
}
$preciofinal=$objEmpresa->registrarVenta($colCodigoMotos[2], $objCliente2);
if($preciofinal >0){

    echo "venta realizada el costo final es de $".$preciofinal."\n";
}
else{
    echo "Venta no realizada\n";
    echo "***********************************************************\n";
}
$susVentas=$objEmpresa->retornarVentasXCliente("dni", 123);
foreach($susVentas as $venta){
    echo "las ventas realizada son:\n".$venta."\n";
    echo "***********************************************************\n";
}
$susVentas=$objEmpresa->retornarVentasXCliente("dni", 321);
foreach($susVentas as $venta){
    echo "las ventas realizada son:\n".$venta."\n";
    echo "***********************************************************\n";
}
echo $objEmpresa."\n";

?>
