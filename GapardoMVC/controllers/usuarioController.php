<?php
    require_once('models/usuarioModel.php' );

    class UsuarioController{
        public $nombreUsuario;
        public $apellido;
        public $clave;
        public $email;

        public function index( $parametros = array() ){
            session_start();  
            require_once('views/header.html');

            if( !isset( $_SESSION['email'] )){
                require_once('views/loginView.php');
                
            }else{

                $email = $_SESSION ['email'];
                $usuario = new UsuarioModel();
                $verPerfil = $usuario->ver($email);

                require_once('views/perfilView.php');
            }     
            require_once('views/footer.html');
            
        }

        public function registrarse( $parametros = array()){

            require_once('views/header2.html');
            require_once('views/registroView.php');
            require_once('views/footer2.html');
        }

        public function registrar( $parametros = array() ){
            if( !isset( $_POST['email'] )  && !isset( $_POST['clave'])){
                return;
            }

            $nombreUsuario = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $clave = $_POST['clave'];

            $usuario = new UsuarioModel();
            $usuario->nombreUsuario = $nombreUsuario;
            $usuario->apellido = $apellido;
            $usuario->email = $email;
            $usuario->clave = sha1( $clave );
            $usuario->nivel = 'usuario';
            $usuario->fecha = 'NOW( )';

            $usuario->registrar();

            header('Location: ../usuario');
        }

        public function login( $parametros = array() ){

            if( !isset( $_POST['email'] )  && !isset( $_POST['clave']) ){
                return;
            }

            $email = $_POST['email'];
            $clave = $_POST['clave'];

            $usuario = new UsuarioModel();
            $usuario->email = $email;
            $usuario->clave = sha1( $clave ) ;

            $resultado = $usuario->login();
            //print_r($resultado[0]);

            if( count( $resultado ) > 0  ) {
                //echo 'Datos validos';
                session_start();
                $_SESSION['email'] = $resultado[0]['email'];

                header('Location: ../usuario');
            } else {
                echo "
                    <script lenguage='javascript'>
                        alert('Usuario o contraseña incorrecta. Vuelve a intentarlo.')               
                    </script>

                      <a href='../usuario'>VOLVER AL LOGIN</a>
                ";
                //header('Location: '); 
                
            }

        }
        public function logout( $parametros = array() ){
            session_start();
            unset( $_SESSION['email'] );
            unset( $_SESSION['nivel'] );
            session_unset();
            session_destroy();
            header('Location: ../usuario');

        }

        public function editar($parametros = array()){
            session_start();
            if( isset( $_POST['email'] )  && isset( $_POST['clave'])){
                return;
            }
            require_once('views/header2.html');
            require_once('views/editarPerfilView.php');
            require_once('views/footer2.html'); 
            
        }
        
        public function actualizarDatos($parametros = array()){
            session_start();

            if (isset($_SESSION['email'])) {
            
                $email = $_SESSION['email'];

                $nombreUsuario = $_POST['nombre'];
                $apellido = $_POST['apellido']; 

                $usuario = new UsuarioModel();
                $usuario->nombreUsuario = $nombreUsuario;
                $usuario->apellido = $apellido;

                $usuario->actualizarDatos($nombreUsuario, $apellido, $email);
                header('Location: ../usuario');
            }
        }

        
        public function cambiar_constraseña($parametros = array()){
            session_start();
            if( isset( $_POST['email'] ) && isset( $_POST['clave']) ){
                return;
            }
            require_once('views/header2.html');
            require_once('views/contraseñaView.php');
            require_once('views/footer2.html'); 
        }

        public function actualizarContraseña( $parametros = array() ){
            session_start();
            
            if (isset($_SESSION['email'])) {

                $email = $_SESSION['email'];
                $clave = $_POST['clave'];
                
                $usuario = new UsuarioModel();
                $usuario->clave = sha1( $clave);
                
                $usuario->actualizarContraseña($email, $clave);

                unset( $_SESSION['email'] );
                unset( $_SESSION['nivel'] );
                session_unset();
                session_destroy();

                header('Location: ../usuario');
            }
        }


    }

?>