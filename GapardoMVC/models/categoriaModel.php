<?php
    require_once 'core/ConexionPDO.php';

    class CategoriaModel extends ConexionDB {
        public $idCategoria;
        public $nombreCategoria;
        public $tipoCategoria;

        public function lista(){
            $this->setQuery("SELECT id_categoria, nombre_categoria, nombre_tipo
                            FROM categoria
                            INNER JOIN tipo ON id_tipo = fk_tipo");

            $resultado = $this->obtenerRow();
            return $resultado;
        }

        

    }
?>