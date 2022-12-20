<?php

    require_once('models/carritoModel.php');

    class CarritoController{
        public $idCarrito;
        public $fkUsuario;

        public function index( $parametros = array() ){
            session_start();

            if (isset ($_SESSION['email'])) {

                $email = $_SESSION['email'];
                $carrito = new CarritoModel();
                $verCarrito = $carrito->verCarrito($email);

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

            if (isset ($_SESSION['email'])) {
                $email = $_SESSION['email'];

                $carrito = new CarritoModel();
                $carrito->email = $email;
                $carrito->subtotal = $subtotal;
                $carrito->pkCarrito = $pkCarrito;
                $carrito->pkinstrumento = $pkinstrumento;

                $carrito->guardar();
                echo "lalala ♫";

                header('Location: producto');

            }else{

                echo "
                    <script lenguage='javascript'>
                        alert('¡Debes iniciar sesión!');
                        window.location.replace('../producto#productos');
                    </script>
                ";
            }
        }

        public function cambiarCantidad($cantidad){
            
            if (isset($_POST['cantidad'])) {

                $cantidad = $_POST['cantidad'];
                
                $carrito = new CarritoModel();
                $carrito->cantidad = $cantidad;
                
                $carrito->cambiarCantidad($cantidad);
                
                header('Location: carrito');
            }
                
        }





    }

?>