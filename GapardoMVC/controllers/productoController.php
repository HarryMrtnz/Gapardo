<?php

    require_once('models/categoriaModel.php');
    require_once('models/productoModel.php');

    class ProductoController{
        public $nombre;
        public $idCategoria;

        public function index( $parametros = array() ){
            $categoria = new CategoriaModel();
            $lista = $categoria->lista();

            if( isset( $_GET['categoria']) ){
                $categoria = $_GET['categoria'];

                $producto = new ProductoModel();
                $listaProductos = $producto->verxCategoria($categoria);
                
            }else if (isset( $_GET['tipo'])) {
                $tipo = $_GET['tipo'];

                $producto = new ProductoModel();
                $listaProductos = $producto->verxTipo($tipo);
            }else {

                $producto = new ProductoModel();
                $listaProductos = $producto->listar();
            }          
            
            require_once('views/header.html');
            require_once('views/productoView.php');
            require_once('views/footer.html'); 
        }

        public function detalle(){
            $id = $_GET['id'];

            $producto = new productoModel();
            $mostrarDetalle = $producto->detalle($id);

            require_once('views/header2.html');
            require_once('views/detalleView.php');
            require_once('views/footer2.html');
        }


    }

?>