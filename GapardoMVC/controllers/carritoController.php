<?php

    require_once('models/productoModel.php');

    class CarritoController{
        public $idCarrito;
        public $fkUsuario;


        public function index( $parametros = array() ){

            require_once('views/header.html');
            require_once('views/carritoView.php');
            require_once('views/footer.html');

        }


    }

?>