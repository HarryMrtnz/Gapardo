<?php

    require_once('models/categoriaModel.php');
    require_once('models/productoModel.php');
    require_once('models/carritoModel.php');

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
            
            if( isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                
                $carrito = new CarritoModel();
                $contar = $carrito->contar($email);
            }

            require_once('views/header.html');
            require_once('views/productoView.php');
            require_once('views/footer.html'); 
            
        }

        public function detalle(){
            $id = $_GET['id'];

            $producto = new productoModel();
            $mostrarDetalle = $producto->detalle($id);

            $verCalificacion = $producto->verCalificacion($id);

            require_once('views/header2.html');
            require_once('views/detalleView.php');
            require_once('views/footer2.html');
        }

        public function calificar(){
            session_start();
            //print_r ($_SESSION);

            if(  isset( $_SESSION['email'] )){
            
                if (isset( $_POST['puntuacion'] )){ 
                
                    if(isset( $_POST['comentario']) ){

                        $puntuacion = $_POST['puntuacion'];
                        $comentario = $_POST['comentario'];
                        $idInstrumento = $_GET['id'];
                        $idUsuario = $_SESSION['id_usuario'];

                        $producto = new productoModel();
                        $producto->puntuacion = $puntuacion;
                        $producto->comentario = $comentario;
                        $producto->idUsuario = $idUsuario;
                        $producto->idInstrumento = $idInstrumento;
                        $producto->fecha = date ('Y-m-d');

                        $producto->calificar();

                        header('Location: ../producto/detalle?id='.$idInstrumento);

                    }else{
                        echo "
                            <script lenguage='javascript'>
                            alert('¡Deja tu comentario!');
                            window.location.replace('../producto#productos');
                            </script>
                        ";
                    }
                }else{
                    echo "
                        <script lenguage='javascript'>
                        alert('¡Recuerda dejar tu puntuación!');
                            window.location.replace('../producto#productos');
                        </script>
                    ";
                }
            }else{     
                echo "
                    <script lenguage='javascript'>
                        alert('¡Debes iniciar sesión!');
                        window.location.replace('../producto#productos');
                    </script>
                ";
            }
        

        }


        
    }

?>