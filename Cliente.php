<?php
/*En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */
    class Cliente{
        private $nombre;
        private $apellido;
        private $estaDadoDeBaja;
        private $tipoDocumento;
        private $nroDocumento;

        public function __construct($nom, $apell, $esta ,$tpDocumento, $numDocu){
            $this->nombre= $nom;
            $this->apellido=$apell;
            $this->estaDadoDeBaja=$esta;
            $this->tipoDocumento=$tpDocumento;
            $this->nroDocumento=$numDocu;
        }

       //metodos de acceso get
       public function getNombre(){
        return $this->nombre;
       } 
       public function getApellido(){
        return $this->apellido;
       }
       public function getEstaDadoDeBaja(){
        return $this->estaDadoDeBaja;
       }

       public function getTipoDocumento(){
        return $this->tipoDocumento;
       }
       public function getNroDocumento(){
        return $this->nroDocumento;
       }
       //metodos de acceso set
       public function setNombre($nom){
        $this->nombre=$nom;
       }
       public function setApellido($apell){
        $this->apellido=$apell;
       }
       public function setEstaDadoDeBaja($esta){
        $this->estaDadoDeBaja=$esta;
       }
       public function setTipoDocumento($tpDocumento){
        $this->tipoDocumento=$tpDocumento;
       }
       public function setNroDocumento($numDocu){
        $this->nroDocumento=$numDocu;
       }
       public function __toString(){
        $cad="Nombre y apellido:".$this->getNombre()." ".$this->getApellido().
             "\nEsta Dado De baja: ".$this->getEstaDadoDeBaja().
             "\nTipo de documento: ".$this->getTipoDocumento().
             "\nNro.Documento: ".$this->getNroDocumento();

        return $cad;
    }
        public function puedeComprar(){
            if($this->getEstaDadoDeBaja() == "si"){ //si el dato obtenido es "si" entonces el cliente no puede realizar la compra 
                $resultado=true;
            }
            else{
                $resultado=false;                    //si el dato obtenido es "no" entonces el cliente puede comprar
            }
            return $resultado;
        }

    }
?>
