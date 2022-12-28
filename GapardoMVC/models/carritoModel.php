<?php
    require_once 'core/ConexionPDO.php';

    class CarritoModel extends ConexionDB {
        public $idCarrito;
        public $idInstrumento;
        public $idUsuario;

        public function guardar(){

            $this->setQuery("INSERT INTO producto_carrito (fk_carrito, fk_instrumento)
                            VALUES (:idCarrito, :idInstrumento)");
            $this->ejecutar(array(
                ':idCarrito' => $this->idCarrito,
                ':idInstrumento' => $this->idInstrumento
            ));
        }

        public function eliminar(){
            $this->setQuery("DELETE FROM producto_carrito
                            WHERE fk_instrumento = :idInstrumento AND fk_carrito = :idCarrito");
            $this->ejecutar(array(
                ':idInstrumento' => $this->idInstrumento,
                ':idCarrito' => $this->idCarrito
            ));
        }

        public function vaciar(){
            $this->setQuery("DELETE FROM producto_carrito
                            WHERE fk_carrito = :idCarrito");
            $this->ejecutar(array(
                ':idCarrito' => $this->idCarrito
            ));
        }

        public function verCarrito($email){
            $this->setQuery("SELECT i.id_instrumento, i.foto, i.nombre_instrumento, i.marca, i.precio
                            FROM producto_carrito pc
                            INNER JOIN instrumento i ON i.id_instrumento = pc.fk_instrumento
                            INNER JOIN carrito c ON c.id_carrito = pc.fk_carrito
                            INNER JOIN usuario u ON u.id_usuario = c.fk_usuario
                            WHERE email = '$email'; ");

            $resultado = $this->obtenerRow(array( ));
            return $resultado; 
        }

        public function contar($email){
            $this->setQuery("SELECT COUNT(*) AS cantidad
                            FROM producto_carrito pc
                            INNER JOIN carrito c ON c.id_carrito = pc.fk_carrito
                            INNER JOIN usuario u ON u.id_usuario = c.fk_usuario
                            WHERE email = '$email'; ");
            $resultado = $this->obtenerRow(array( ));
            return $resultado; 
        }

    }
?>