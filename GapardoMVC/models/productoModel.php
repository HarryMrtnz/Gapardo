<?php
    require_once 'core/ConexionPDO.php';

    class ProductoModel extends ConexionDB {

        public $idInstrumento;
        public $nombreInstrumento;
        public $marca;
        public $descripcion;
        public $detalle;
        public $precio;
        public $cantidad;
        public $foto;
        public $fkCategoria;

        public function listar(){
            $this->setQuery("SELECT * FROM instrumento");

            $resultado = $this->obtenerRow();
            return $resultado;
        }

/*         public function listarporCategoria($categoria){
            $this->setQuery("SELECT * FROM instrumento
                            WHERE fk_categoria = '$categoria';");

            $resultado = $this->obtenerRow();
            return $resultado;
        } */

        public function detalle($id){
            $this->setQuery("SELECT * FROM instrumento
                            WHERE id_instrumento = $id");

            $resultado = $this->obtenerRow();
            return $resultado;
        }



        

    }
?>