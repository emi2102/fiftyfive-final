<?php   
require_once('layouts/header.php');
?>
 <div class="contenido">
        <div class="text">
        <h2>EDITAR DATOS PERSONALES</h2>
        <br> 
<form action="" method="get">
   
        <div class="edit_tarea2">
    
        <div class="bloc">
   
        <label >Correo </label><br>
              <input type="email" required="required" name="correo">
             
              
              <br>
              <label >Nombre</label><br>
              <input type="text" required="required"  name="nombre">
              <br>
              <label >Apellido</label><br>
              <input type="text" required="required"  name="apellido">
              <br>
              <label >Nombre de Usuario</label><br>
              <input type="text" required="required"  name="n_usuario">
              <br>
              <label >Contraseña</label><br>
              <input type="password" required="required"  name="contrasenia">
              <br>
             
              

    <br>
    </div>
    <div class="bloc">
</div>
<div class="bloc">
</div>


    <input type="submit" class="submit-notas btn3" value="Guardar">
    <input type="hidden" name="n" value="actualizaru2"> 
        </div>
    
</form>

        
        </div>
 </div>
 <script src="vista/script.js"></script>
 <?php
require_once('layouts/footer.php');
?>