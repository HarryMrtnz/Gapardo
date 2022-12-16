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

        public function verxCategoria($categoria){
            $this->setQuery("SELECT * FROM instrumento
                            WHERE fk_categoria = $categoria");

            $resultado = $this->obtenerRow();
            return $resultado;
        }

        public function verxTipo($tipo){
            $this->setQuery("SELECT * FROM instrumento
                            INNER JOIN categoria ON id_categoria = fk_categoria
                            INNER JOIN tipo ON id_tipo = fk_tipo
                            WHERE id_tipo = $tipo");

            $resultado = $this->obtenerRow();
            return $resultado;
        }

        public function detalle($id){
            $this->setQuery("SELECT * FROM instrumento
                            WHERE id_instrumento = $id");

            $resultado = $this->obtenerRow();
            return $resultado;
        }

        public function calificar ($puntuacion, $comentario, $idUsuario){
            $this->setQuery("INSERT INTO calificacion (puntuacion, comentario, fk_usuario)
                            VALUES(:puntuacion, :comentario, :fk_usuario)
                            ");

            $this->ejecutar(array(
                ':puntuacion' => $puntuacion,
                ':comentario' => $comentario,
                ':fk_usuario' => $idUsuario,
            ));   

        }

        public function verCalificacion ($id){
            $this->setQuery("SELECT nombre_usuario, puntuacion, comentario 
                            FROM calificacion
                            INNER JOIN instrumento ON id_instrumento = fk_instrumento
                            INNER JOIN usuario ON id_usuario = fk_usuario
                            WHERE fk_instrumento = $id
                            ORDER BY id_calificacion DESC");

            $resultado = $this->obtenerRow();
            return $resultado;
        }

    }
?>