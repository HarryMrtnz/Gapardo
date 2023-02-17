<?php

    require_once('models/carritoModel.php');

    class CarritoController{
        public $idCarrito;
        public $idInstrumento;
        public $idUsuario;

        public function index( $parametros = array() ){
            session_start();

            if (isset ($_SESSION['email'])) {
                $email = $_SESSION['email'];

                $carrito = new CarritoModel();
                $verCarrito = $carrito->verCarrito($email);
                $contar = $carrito->contar($email);

                require_once('views/header.html');
                require_once('views/carritoView.php');
                require_once('views/footer.html');
                
            }else{

                echo "
                    <script lenguage='javascript'>
                        alert('¡Debes iniciar sesión!');
                        window.location.replace('producto#productos');
                    </script>
                ";
            }
        }

        public function guardar( $parametros = array() ){
            session_start();

            if (isset ($_SESSION['id_usuario'])) {
                
                $idInstrumento = $_GET['id'];
                $idUsuario = $_SESSION['id_usuario'];
                $idCarrito = $_SESSION['id_carrito'];

                $carrito = new CarritoModel();
                $carrito->idInstrumento = $idInstrumento;
                $carrito->idUsuario = $idUsuario;
                $carrito->idCarrito = $idCarrito;

                $carrito->guardar();


                echo "
                <script lenguage='javascript'>
                    alert('¡Agregaste un producto a tu carrito');
                    window.location.replace('../producto#productos');
                </script>"
                ;

            }else{

                echo "
                    <script lenguage='javascript'>
                        alert('¡Debes iniciar sesión!');
                        window.location.replace('../producto#productos');
                    </script>
                ";
            }
        }

        public function eliminar(){
            session_start();

            if (isset ($_SESSION['id_usuario'])) {
                
                $idInstrumento = $_GET['id'];
                $idUsuario = $_SESSION['id_usuario'];
                $idCarrito = $_SESSION['id_carrito'];

                $carrito = new CarritoModel();
                $carrito->idInstrumento = $idInstrumento;
                $carrito->idUsuario = $idUsuario;
                $carrito->idCarrito = $idCarrito;

                $eliminar = $carrito->eliminar();
                
                echo "
                    <script lenguage='javascript'>
                        alert('¡Producto eliminado del carrito!');
                        window.location.replace('../carrito');
                    </script>
                ";

            }
        }

        public function vaciar(){
            session_start();

            if (isset ($_SESSION['id_usuario'])) {

                $idCarrito = $_SESSION['id_carrito'];
                $carrito = new CarritoModel();
                $carrito->idCarrito = $idCarrito;
                
                $vaciar = $carrito->vaciar();

                echo "
                    <script lenguage='javascript'>
                        alert('¡Se eliminaron todos los productos del carrito');
                        window.location.replace('../carrito');
                    </script>
                ";
            }
        }

        public function cambiarCantidad(){
            session_start();

            if (isset ($_POST['cant'])) {
                $cantidad = $_POST['cant'];

                $carrito = new CarritoModel();

                header('Location: ../carrito');
            }
        }


    }

?>