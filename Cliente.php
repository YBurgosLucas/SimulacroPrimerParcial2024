<?php
/*0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase. */
    class Cliente{
        private $nombre;
        private $apellido;
        private $estaDadoDeBaja;  // Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
        private $tipoDocumento;
        private $nroDocumento;

        public function __construct($nomb, $apell, $baja, $tipoD, $dni){
                $this->nombre=$nomb;
                $this->apellido=$apell;
                $this->estaDadoDeBaja=$baja;
                $this->tipoDocumento=$tipoD;
                $this->nroDocumento=$dni; 
        }
//metodos de acceso get
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEstaDadoDeBaja() {
        return $this->estaDadoDeBaja;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }
//metodos de acceso set
    public function setNombre($nomb) {
        $this->nombre = $nomb;
    }

    public function setApellido($apell) {
        $this->apellido = $apell;
    }

    public function setEstaDadoDeBaja($baja) {
        $this->estaDadoDeBaja = $baja;
    }

    public function setTipoDocumento($tipoD) {
        $this->tipoDocumento = $tipoD;
    }

    public function setNumeroDocumento($dni) {
        $this->numeroDocumento = $dni;
    }
    
    public function darDeBaja(){
        
        if($this->getEstaDadoDeBaja()){
            $estado=true;    
        }
        else{
            $estado=false;
        }
        $this->setEstaDadoDeBaja($estado);
        return $estado;
    }


    public function __toString(){
        $cadena="Nombre y apellido (cliente): ".$this->getNombre()." ".$this->getApellido().
                "\nEstado: ".$this->getEstaDadoDeBaja().
                "\nTipo Documento: ".$this->getTipoDocumento().
                "\nNro.Documento: ".$this->getNumeroDocumento();
        return $cadena;
    }
}
