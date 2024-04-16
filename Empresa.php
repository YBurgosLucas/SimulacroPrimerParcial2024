<?php
/*1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
FACULTAD DE INFORMÁTICA
CÁTEDRA INTRODUCCIÓN POO
5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
 */
    class Empresa{
        private $denominacion;
        private $direccion;
        private $coleccionClientes;
        private $coleccionMotos;
        private $colecVentasRealizadas;

        public function __construct($categoria, $addres, $colecClientes, $colecMotos, $colecVRealizadas){
            $this->denominacion= $categoria;
            $this->direccion= $addres;
            $this->coleccionClientes=$colecClientes;
            $this->coleccionMotos=$colecMotos;
            $this->colecVentasRealizadas= $colecVRealizadas;
        }
    //metodos de acceso de get
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColeccionClientes() {
        return $this->coleccionClientes;
    }

    public function getColeccionMotos() {
        return $this->coleccionMotos;
    }

    public function getColecVentasRealizadas() {
        return $this->colecVentasRealizadas;
    }
//metodos acceso set
    public function setDenominacion($categoria) {
        $this->denominacion = $categoria;
    }

    public function setDireccion($addres) {
        $this->direccion = $addres;
    }

    public function setColeccionClientes($colecClientes) {
        $this->coleccionClientes = $colecClientes;
    }

    public function setColeccionMotos($colecMotos) {
         $this->coleccionMotos = $colecMotos;
    }

    public function setColecVentasRealizadas($colecVRealizadas) {
         $this->colecVentasRealizadas = $colecVRealizadas;
    }

    public function colecClientes(){
        $cadena="";
        foreach($this->getColeccionClientes() as $objClientes){
            $cadena.=$objClientes."\n";
        }
        return $cadena;
    }
    public function colecMotos(){
        $cadena1="";
        foreach($this->getColeccionMotos() as $objMotos){
            $cadena1.=$objMotos."\n";
        }
        return $cadena1;
    }
    public function colecVentasRealizada(){
        $cadena2="";
        foreach($this->getColecVentasRealizadas() as $objVentaR){
            $cadena2.=$objVentaR."\n";
        }
        return $cadena2;
    }

    public function __toString(){
        $cad="DATOS DE LA EMPRESA:\nDenominacion: ".$this->getDenominacion().
                "\nDireccion: ".$this->getDireccion().
                "\nColeccion Clientes:".$this->colecClientes().
                "\nColeccion de Motos:".$this->colecMotos().
                "\nColeccion Ventas Hechas:".$this->colecVentasRealizada();
        return $cad;
    }
     
    public function retornarMoto($codigoMoto){
        $encontrado=0;
        foreach($this->getColeccionMotos() as $objMoto){
            if($objMoto->getCodigo() == $codigoMoto){
                $encontrado=$objMoto;
            }
        }
        return $encontrado;
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
        $j=count($this->getColecVentasRealizadas());
        $numero=0;
        $fecha=date("Y-m-d");
        $importeFinal=0;
        $nuevaVenta=new Venta($numero++, $fecha,  $objCliente ,$this->getColeccionMotos() , $importeFinal);
        $ColecVentaEmpresa=[];
    if(is_array($colCodigosMoto) || is_object($colCodigosMoto)){
        foreach ($colCodigosMoto as $codigoMoto){
            $objMoto=$this->retornarMoto($codigoMoto);
            if( ($objMoto->estadoMoto() == 0 ) && ($objCliente->darDeBaja()== false)){
                $nuevaVenta->incorporarMoto($objMoto);
                $importeFinal+=$objMoto->darPrecioVenta(); 
            }
        }
     }
     if($nuevaVenta->getPrecioFinal($importeFinal) > 0){
        $ColecVentaEmpresa[$j]=$nuevaVenta;
        $this->setColecVentasRealizadas($ColecVentaEmpresa);
        $nuevaVenta->setNumero($numero++);
        $nuevaVenta->setPrecioFinal($importeFinal);
        
     }
        return $importeFinal;
    }
     
    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente=[];

        foreach ($this->getColecVentasRealizadas() as $venta){
            $clienteVenta=$venta->getReferenciaCliente();
                if(($clienteVenta->getNumeroDocumento() == $numDoc) && ($clienteVenta->getTipoDocumento() == $tipo)){
                     $ventasCliente[]=$venta;
                
                  }
                else{
                    $ventasCliente[]=0;
                }
            
        }
        
        return $ventasCliente;
    }


    }
