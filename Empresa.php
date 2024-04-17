<?php
/*Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.

 */
    class Empresa{
        private $denominacion;
        private $direccion;
        private $coleccionClientes;
        private $coleccionMotos;
        private $coleccionVentasRealizadas;

        public function __construct($categoria, $adress, $colecClientes, $colecMotos, $colecVentasHechas ){
            $this->denominacion=$categoria;
            $this->direccion=$adress;
            $this->coleccionClientes=$colecClientes;
            $this->coleccionMotos=$colecMotos;
            $this->coleccionVentasRealizadas=$colecVentasHechas;
        }
        //metodos de acceso
        public function getDenominacion(){
            return $this->denominacion;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getColeccionClientes(){
            return $this->coleccionClientes;
        }
        public function getColeccionMotos(){
            return $this->coleccionMotos;
        }
        public function getColeccionVentasRealizadas(){
            return $this->coleccionVentasRealizadas;
        }
        //metodos de acceso set
        public function setDenominacion($categoria){
             $this->denominacion=$categoria;
        }
        public function setDireccion($adress){
            $this->direccion=$adress;
        }
        public function setColeccionClientes($colecClientes){
            $this->coleccionClientes=$colecClientes;
        }
        public function setColeccionMotos($colecMotos){
            $this->coleccionMotos=$colecMotos;
        }
        public function setColeccionVentasRealizadas($colecVentasHechas){
             $this->coleccionVentasRealizadas=$colecVentasHechas;
        }
 //metodos para concatenar las colecciones
        public function colClientes(){
            $cad="";
            foreach($this->getColeccionClientes() as $clientes){
                $cad.=$clientes."\n";
            }
            return $cad;
        }
        public function colMotos(){
            $cad="";
            foreach($this->getColeccionMotos() as $motos){
                $cad.=$motos."\n";
            }
            return $cad;
        }
        public function colVentasHechas(){
            $cad="";
            foreach($this->getColeccionVentasRealizadas() as $ventas){
                $cad.=$ventas."\n";
            }
            return $cad;
        }

        public function __toString(){
            $cadena="Denominacion:". $this->getDenominacion().
                    "\nDireccion: ".$this->getDireccion().
                    "\nColeccion Clientes:\n".$this->colClientes().
                    "\nColeccion Motos:\n".$this->colMotos()."\n".
                    "\nColeccion Ventas Realizada:\n".$this->colVentasHechas();
            return $cadena;
        }
        /*5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro. */
        public function retornarMoto($codigoMoto){
            $objMoto=null;
            $colecMotos=$this->getColeccionMotos();
            $i=0;
            while($i<=count($colecMotos) && $objMoto == null){
                if($colecMotos[$i]->getCodigo() ==  $codigoMoto){
                    $objMoto=$colecMotos[$i];
                }
               $i++; 
            }
            return $objMoto;

        }
    /*6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta. */
        public function registrarVenta ($colCodigosMoto, $objCliente ){
            $importeFinal=0;
            $colecVentas=$this->getColeccionVentasRealizadas(); 
            $colecMotos=$this->getColeccionMotos();  
            $numero=1;
            $fecha=date("y-m-d");
            $nuevaVenta=new Venta($numero, $fecha, $objCliente, $colecMotos, 0); //instancia Venta creada
            $j=count($colecVentas);
            $objMoto=null;
            if(is_array($colCodigosMoto) ){ 
              foreach($colCodigosMoto as $codigoMoto){
                $objMoto=$this->retornarMoto($codigoMoto);
                if($objMoto != null){
                    if( ($objMoto->getActiva()) && ($objCliente->puedeComprar()==false)){
                        $nuevaVenta->incorporarMoto($objMoto);
                        $colecVentas[$j]=$nuevaVenta;
                        $importeFinal=$objMoto->darPrecioVenta();

                    }
                }
              }
            }
            if($importeFinal >0){
                $this->setColeccionVentasRealizadas($colecVentas);
 
            }
        
            return $importeFinal;

        }
   /*7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */     
        public function retornarVentasXCliente($tipo, $numDoc){
            $nuevacolec=[];
            foreach($this->getColeccionVentasRealizadas() as $ventasCliente){
                $cliente=$ventasCliente->getObjCliente();
                if($cliente->getTipoDocumento()== $tipo && $cliente->getNroDocumento()== $numDoc){
                    $nuevacolec[]=$ventasCliente;
                }
                else{
                    $nuevacolec[]=0;
                }
            }
            return $nuevacolec;
        }
        

    }

?>
