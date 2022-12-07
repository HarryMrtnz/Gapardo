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
                $usuario = new UsuarioModel();
                $verPerfil = $usuario->ver();

                require_once('views/perfilView.php');
            }     
            require_once('views/footer.html');
            
        }

        public function registrarse( $parametros = array()){

            require_once('views/header.html');
            require_once('views/registroView.php');
            require_once('views/footer.html');
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
                echo 'Datos validos';
                session_start();
                $_SESSION['email'] = $resultado[0]['email'];

                header('Location: ../usuario');
            } else {
                echo 'Usuario o contraseña invalidos';
                echo '<a href="../usuario">Volver</a>';
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

        public function crear( $parametros = array() ){
            // Recibo las variables por POST
            print_r( $parametros  );
            echo 'Crear usuario';

            // Intancio el modelo 

            // Ejecuto las querys
        }

        public function editar($parametros = array()){
            session_start();

            require_once('views/header.html');
            require_once('views/editarPerfilView.php');
            require_once('views/footer.html'); 
        }
        
        public function actualizar($parametros = array()){
            session_start();

            $nombreUsuario = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $usuario = new UsuarioModel();
            $usuario->nombreUsuario = $nombreUsuario;
            $usuario->apellido = $apellido;
            
            $usuario->actualizar();
            header('Location: ../usuario');
        }

        
        public function cambiar_constraseña($parametros = array()){
            print_r( $parametros  );
            echo 'Actulizando';
        }

        public function eliminar( $parametros = array() ){
            print_r( $parametros  );
            echo 'Eliminando usuario';
        }
    }

?>