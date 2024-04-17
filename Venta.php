<?php
/*1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */
    class Venta{
        private $numero;
        private $fecha;
        private $objCliente;
        private $coleccionMotos;
        private $precioFinal;

        public function __construct($num, $date, $refCliente, $colecMotos, $costoFinal){
            $this->numero= $num;
            $this->fecha=$date;
            $this->objCliente=$refCliente;
            $this->coleccionMotos=$colecMotos;
            $this->precioFinal=$costoFinal;
        }

        //metodos de acceso get
        public function getNumero(){
            return $this->numero;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getObjCliente(){
            return $this->objCliente;
        }
        public function getColeccionMotos(){
            return $this->coleccionMotos;
        }
        public function getPrecioFinal(){
            return $this->precioFinal;
        }
        //metodos de acceso set
        public function setNumero($num){
            $this->numero=$num;
        }
        public function setFecha($date){
            $this->fecha=$date;
        }
        public function setObjCliente($refCliente){
            $this->objCliente=$refCliente;
        }
        public function setColeccionMotos($colecMotos){
            $this->coleccionMotos=$colecMotos;
        }
        public function setPrecioFinal($costoFinal){
            $this->precioFinal=$costoFinal;
        }

        public function colMotos(){
            $cadena="";
            foreach($this->getColeccionMotos()as $moto){
                $cadena.=$moto."\n";
            }
            return $cadena;
        }

        public function __toString(){
            $cad="numero: ".$this->getNumero().
                 "\nFecha: ".$this->getFecha().
                 "\nReferenciaCliente:".$this->getObjCliente().
                 "\nColeccion de moto: ".$this->colMotos().
                 "Precio Final: $".$this->getPrecioFinal();
            return $cad;
        }
        /*5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario. */
        public function incorporarMoto($objMoto){
            $nuevcolec=[];
            $i=count($nuevcolec);
            if(($objMoto->getActiva()) && ($this->getObjCliente()->puedeComprar()== false)){
                $nuevcolec[$i]=$objMoto;
                $precio=$objMoto->darPrecioVenta();
                $this->setColeccionMotos($nuevcolec);
            }
            else{
                $colMotos=0;
                $precio=0;
            }
            $this->setPrecioFinal($precio);
            
        }
    }

?>

