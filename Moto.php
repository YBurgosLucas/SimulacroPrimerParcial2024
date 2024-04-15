<?php
/*1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */
    class Moto{ 
        private $codigo;
        private $costo;
        private $anioFabricaion;
        private $descripcion;
        private $por_inc_anual;
        private $activa;

        public function __construct($cdg, $precio, $anioF, $resumen, $porcentajeAnual, $disponible){
            $this->codigo= $cdg;
            $this->costo= $precio;
            $this->anioFabricacion=$anioF;
            $this->descripcion=$resumen;
            $this->por_inc_anual=$porcentajeAnual;
            $this->activa= $disponible;

        }
    //metodos acceso get
        public function getCodigo() {
            return $this->codigo;
        }
    
        public function getCosto() {
            return $this->costo;
        }
    
        public function getAnioFabricacion() {
            return $this->anioFabricacion;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }
    
        public function getPorIncAnual() {
            return $this->por_inc_anual;
        }
    
        public function getActiva() {
            return $this->activa;
        }
    //metodos acceso set
    public function setCodigo($cdg) {
        $this->codigo = $cdg;
    }

    public function setCosto($precio) {
        $this->costo = $precio;
    }

    public function setAnioFabricacion($anioF) {
        $this->anioFabricacion = $anioF;
    }

    public function setDescripcion($resumen) {
        $this->descripcion = $resumen;
    }

    public function setPorIncAnual($porcentajeAnual) {
        $this->por_inc_anual = $porcentajeAnual;
    }

    public function setActiva($disponible) {
        $this->activa = $disponible;
    }

    public function __toString(){
        $cad="Codigo: ".$this->getCodigo().
             "\nCosto: ".$this->getCosto().
             "\nAnios: ".$this->getAnioFabricacion().
             "\nDescripcion:\n".$this->getDescripcion().
             "\nPorcentaje Incremento Anual:".$this->getPorIncAnual().
             "%\nEstado Disponible :".$this->getActiva()."\n";
        return $cad;
    }
    public function estadoMoto(){
        if($this->getActiva() == "true"){
            $estado=true;
        }
        else{ 
            $estado=false;
        }
        return $estado;
    }

    public function darPrecioVenta(){
        $anio=2024- $this->getAnioFabricacion();
        $_compra=$this->getCosto();
        if($this->estadoMoto()){
            $_venta = $_compra + $_compra * ($anio * $this->getPorIncAnual());
        }
        else{
            $_venta=-1;
        }
     return $_venta;
    }

    }