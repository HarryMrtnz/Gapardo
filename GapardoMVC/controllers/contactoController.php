<?php
    class ContactoController{

        public function contactoController(){
            require_once('views/header.html');
            require_once('views/contactoView.html');
            
            echo '<h1> Contacto del controller</h1>';
            require_once('views/footer.html');

        }

    }


?>