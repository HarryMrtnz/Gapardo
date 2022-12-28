<?php

    require_once('models/categoriaModel.php');

    class tipoCategoriaController{
        public $nombre;
        public $idTipo;


        public function index( $parametros = array() ){
            $tipoCategoria = new tipoCategoriaModel();
            $lista = $tipoCategoria->lista();

            require_once('views/header.html');
            require_once('views/categoriaABMView.php');
            require_once('views/footer.html');
        }
    }


?> 