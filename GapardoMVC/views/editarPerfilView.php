<main id="altauser">
   
   <div class="alta">
       <div>
           <h5>ACTUALIZA TUS DATOS</h5>
           <img src="../public/img/editar.png" alt="ag">
       </div>
       <form method="post" action="actualizar" name="alta">
           <p>Ingresa tus datos:</p>
           <div><input class="form-control" type="nombre" placeholder="Nombre:" name="nombre" required/></div>
           <div><input class="form-control" type="apellido" placeholder="Apellido:" name="apellido" required/></div>

           <div><input type="submit" id="boton3" value="Listo" onclick="valida_envia()"></div>	
       </form>
   
       <script type="text/javascript">

           function valida_envia(){

               if(document.alta.nombre.value.length==0){
                   alert("Por favor, escriba su nombre.")
                   document.alta.nombre.focus()
                   return 0;
               }
               
               if(document.alta.apellido.value.length==0){
                   alert("Por favor, escriba su apellido.")
                   document.alta.apellido.focus()
                   return 0;
               }
           
/*                if(document.alta.email.value.length==0){
                   alert("Por favor, escriba su correo electrónico.")
                   document.alta.email.focus()
                   return 0;
               }

               if(document.alta.clave.value.length==0){
                   alert("Por favor, escriba su contraseña")
                   document.alta.clave.focus()
                   return 0;
               } */
           }
       </script>

   </div>
</main>