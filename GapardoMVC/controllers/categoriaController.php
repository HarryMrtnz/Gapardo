<?php

    require_once('models/categoriaModel.php');
    require_once('models/productoModel.php');

    class CategoriaController{
        public $nombre;
        public $idCategoria;


        public function index( $parametros = array() ){

            $categoria = new CategoriaModel();
            $lista = $categoria->lista();

            $producto = new ProductoModel();
            $listaProductos = $producto->listar($categoria);

            require_once('views/header.html');
            require_once('views/categoriaABMView.php');
            require_once('views/footer.html');

        }


    }

?>