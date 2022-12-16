<?php
    require_once 'core/ConexionPDO.php';

    class UsuarioModel extends ConexionDB {
        public $idUsuario;
        public $nombreUsuario;
        public $apellido;
        public $email;
        public $clave;
        public $nivel;
        public $fecha;

        public function ver($email){
            $this->setQuery("SELECT nombre_usuario, apellido, email
                            FROM usuario
                            WHERE email = '$email'; ");

            $resultado = $this->obtenerRow(array());
            return $resultado; 
        }

        public function registrar(){
            $this->setQuery("INSERT INTO usuario (nombre_usuario, apellido, email, clave, nivel, fecha_alta)
                            VALUES(:nombre_usuario, :apellido, :email, :clave, :nivel, :fecha_alta)");
            $this->ejecutar(array(
                ':nombre_usuario' => $this->nombreUsuario,
                ':apellido' => $this->apellido,
                ':email' => $this->email,
                ':clave' => $this->clave,
                ':nivel' => $this->nivel,
                ':fecha_alta' => $this->fecha
            ));            
        }

        public function login(){
            $this->setQuery("SELECT email, clave
                            FROM usuario
                            WHERE email = :email AND clave = :clave;");
            $resultado = $this->obtenerRow(array(
                        ':email' => $this->email,
                        ':clave' => $this->clave    
            ));
            return $resultado;
        }

        public function actualizarDatos($nombreUsuario, $apellido, $email ){
            $this->setQuery("UPDATE usuario
                            SET nombre_usuario = :nombre_usuario,
                            apellido = :apellido
                            WHERE email = '$email';");
            $this->ejecutar(array(
                ':nombre_usuario' => $nombreUsuario,
                ':apellido' => $apellido,
            ));               
        }

        public function actualizarContraseña($email, $clave){
            $this->setQuery("UPDATE usuario
                            SET clave = :clave
                            WHERE email = '$email';");
            $this->ejecutar(array(
                ':clave' => $this->clave,
            ));
        }


    }
?>