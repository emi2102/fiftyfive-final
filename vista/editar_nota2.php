<?php 
require_once('layouts/header.php');
?>
 <div class="contenido">
        <div class="text">
<h2>EDITAR ANOTACION</h2>
<br><br>
<form action="" method="get">
    <?php
    foreach($dato2 as $key2 => $value2):
        foreach($value2 as $v2):
        ?>
        <div class="edit_tarea2">
    
        <div class="bloc">
    <label for="descripcion_anotaciones"> <strong>Descripción</strong> </label>     <br>
    <textarea  required="required" name="descripcion_anotaciones" id="descripcion_anotaciones" cols="100" rows="10"><?php echo $v2['descripcion_anotaciones'] ?></textarea>  <br>
    </div>

    <div class="bloc">
    



</div>

<div class="bloc">



</div>
<input type="hidden" value="<?php echo $v2['id'] ?>" name="id"> <br>
    <input type="submit" class="submit-notas btn3" value="Editar">
    <input type="hidden" name="n" value="actualizar_nota2"> 
        </div>
    <?php
        endforeach;
    endforeach;
    ?>
</form>

        
        </div>
 </div>
 <script src="vista/script.js"></script>
 <?php
require_once('layouts/footer.php');
?>