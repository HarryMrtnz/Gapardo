<?php
    require_once 'core/ConexionPDO.php';

    class ProductoModel extends ConexionDB {

        public $id_instrumento;
        public $nombreInstrumento;
        public $marcaInstrumento;
        public $descripcionInstrumento;
        public $detallesInstrumento;
        public $precioInstrumento;
        public $cantidadInstrumento;
        public $fotoInstrumento;
        public $categoriaInstrumento;

        public function listar(){
            $this->setQuery("SELECT id_instrumento, nombreInstrumento,  precioInstrumento, fotoInstrumento
                            FROM instrumentos");
            $resultado = $this->obtenerRow();
            return $resultado;

        }

        public function guardar(){
            $this->setQuery("");
            $this->ejecutar(array(
                
            ));
        }

        
    }
?>