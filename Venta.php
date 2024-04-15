<?php
/*1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
 */
    class Venta{
        private $numero;
        private $fecha;
        private $referenciaCliente;
        private $coleccionMotos;
        private $precioFinal;

          function __construct($num, $data, $refCliente, $colecMotos, $costoFinal) {
            $this->numero= $num;
            $this->fecha= $data;
            $this->referenciaCliente=$refCliente;
            $this->coleccionMotos= [$colecMotos];
            $this->precioFinal=$costoFinal;
    
        }
    //metodos de acceso get
    public function getNumero() {
        return $this->numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getReferenciaCliente() {
        return $this->referenciaCliente;
    }

    public function getColeccionMotos() {
        return $this->coleccionMotos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }
    //metodos de acceso set
    public function setNumero($num) {
        $this->numero = $num;
    }

    public function setFecha($data) {
        $this->fecha = $data;
    }

    public function setReferenciaCliente($refCliente) {
        $this->referenciaCliente = $refCliente;
    }

    public function setColeccionMotos($colecMotos) {
        $this->coleccionMotos = [$colecMotos];
    }

    public function setPrecioFinal($costoFinal) {
        $this->precioFinal = $costoFinal;
    }
 
    public function __toString(){
        $cadena="numero: ".$this->getNumero().
                "\nfecha: ".$this->getFecha().
                "\nReferencia al Cliente: ".$this->getReferenciaCliente().
                "\nColeccion de motos:\n ".$this->getColeccionMotos().
                "\nPrecioFinal: ".$this->getPrecioFinal()."\n";
        return $cadena;
    }

    public function incorporarMoto($objMoto){
        if ($this->estadoMoto($objMoto)){
            $this->getColeccionMotos()[]=$objMoto;
            $valor=$objMoto->darPrecioVenta();
            $resultado=true;
        }
        else{
            $resultado=false;
        }
        $this->setPrecioFinal($valor);
        return $resultado;

    }
     public function sePuedeVender(){
        if($this->incorporarMoto($objMoto)){
            $respuesta=true;
        }
        else{
            $respuesta=false;
        }
        return $respuesta;  
     }

    }