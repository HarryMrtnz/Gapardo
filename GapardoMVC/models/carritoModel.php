<?php
    require_once 'core/ConexionPDO.php';

    class CarritoModel extends ConexionDB {
        public $email;
        public $fkCarrito;
        public $fkInstrumento;
    

        public function guardar(){
            $this->setQuery("INSERT INTO producto_carrito (cantidad, subtotal, fk_instrumento, fk_carrito)
                            VALUES(1, :subtotal, :idInstrumento, :idCarrito)");
            $this->ejecutar(array(
                ':subtotal' => $this->subtotal,
                ':idInstrumento' => $this->fkInstrumento,
                ':idCarrito' => $this->fkCarrito
            ));            
        }

        public function vaciar(){
            $this->setQuery("DELETE FROM producto_carrito
                            WHERE fk_carrito = :fk_carrito");
            $this->ejecutar(array(
                ':fk_carrito' => $this->fk_carrito
            ));
        }

        public function verCarrito($email){
            $this->setQuery("SELECT i.foto, i.nombre_instrumento, i.marca, i.precio, pc.cantidad
                            FROM producto_carrito pc
                            INNER JOIN instrumento i ON i.id_instrumento = pc.fk_instrumento
                            INNER JOIN carrito c ON c.id_carrito = pc.fk_carrito
                            INNER JOIN usuario u ON u.id_usuario = c.fk_usuario
                            WHERE email = '$email'; ");

            $resultado = $this->obtenerRow(array(
                //':fk_carrito' => $this->fk_carrito,
            ));
            return $resultado; 
        }

        public function cambiarCantidad($cantidad){
            $this->setQuery("UPDATE producto_carrito
                            SET cantidad = :cantidad
                            WHERE fk_instrumento = :fkInstrumento");
            $this->ejecutar(array(
                ':cantidad' => $this->cantidad
            ));
        }


    }
?>