<main id="altauser">
   
   <div class="alta">
       <div>
           <h5>CAMBIA TU CONTRASEÑA</h5>
           <img src="../public/img/editar.png" alt="ag">
       </div>
       <form method="post" action="usuario" name="alta">
           <p>Ingresa una nueva contraseña:</p>
        
           <div><input class="form-control" type="password" placeholder="Contraseña:" name="clave" required/></div>

           <div><input type="submit" id="boton3" value="Listo" onclick="valida_envia()"></div>	
       </form>
   
       <script type="text/javascript">

           function valida_envia(){

               if(document.alta.clave.value.length==0){
                   alert("Por favor, escriba su contraseña")
                   document.alta.clave.focus()
                   return 0;
               }
           }
       </script>

   </div>
</main>