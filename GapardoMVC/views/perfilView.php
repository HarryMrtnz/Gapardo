    <main id="perfil">        
        <div class="salir">
            <a href="usuario/logout">CERRAR SESION
            <img src="public/img/salir.png" alt="salir"></a>
        </div>
        <div class="perfil">
            <div>
                <h3>BIENVENIDO A GAPARDO</h3>
                <h3>Mis datos:</h3>

                <?php
                    foreach ($verPerfil as $usuario ) {
                        $email = $usuario['email'];
                        $nombreUsuario = $usuario['nombre_usuario'];
                        $apellido = $usuario['apellido'];
                    
                    echo"
                        <img src='public/img/logo_perfil.png' alt='logo_perfil'>

                        <h5>$nombreUsuario $apellido</h5>
                        <h5>$email</h5>     
                        <hr>
                        <ul>
                            <li>
                                <a href='usuario/editar'>Editar mi perfil</a>
                                <a href='usuario/cambiar_constraseña'>Cambiar contraseña</a>
                            </li>
                        </ul>
                    "; 
                    }
                ?>
            </div>
    
        </div>
    </main>