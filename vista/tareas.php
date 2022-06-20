
<?php
require_once('layouts/header.php');
?>
 <div class="contenido">
        <div class="text">

    <div class="contenedor-tareas">
        <div>
        <button class="boton-crear-tarea" id="abrir">Crear Tarea</button> 
      <button class="boton-crear-tarea" id="abrir2">Crear anotación</button> 
        

        </div>
    </div>
    <!-- Aparecen las tareas, pff -->
    <?php
     if(!empty($dato)):
        foreach($dato as $key => $value)
            foreach($value as $v):?>
                    <div class="grid--recuadro " style="background-color:<?php echo $v['color'] ?>; ">
                        <h3><?php echo $v['titulo'] ?> </h3>
                        <p><?php echo $v['descripcion'] ?> </p>
                        <p><?php echo $v['fecha_finalizacion'] ?> </p>
                        <p>
                            <div class="contenedor-iconos2">
                                  <a href="index.php?n=editar&id=<?php echo $v['id']?>"><i class="fa-solid fa-pen-to-square iconos2"></i></a>
                            <a href="index.php?n=archivar&id=<?php echo $v['id']?>"><i class="fa-solid fa-box-archive iconos2"></i></a>
                            <a href="index.php?n=papelera&id=<?php echo $v['id']?>"><i class="fa-solid fa-trash-can iconos2"></i></a> 
                            <a href="index.php?n=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('¿Estas seguro de eliminar?'); false"><i class="fa-solid fa-circle-xmark iconos2"></i></a> 
                            </div>
                        </p>
                    </div>
         <?php endforeach; ?>
     <?php else: ?>         
     <?php endif ?>

<!--MODAL PARA CREAR TAREA-->
    
        <div id="miModal" class="modal">
        <div class="flex" id="flex">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    
                    <span class="close" id="close"> Cerrar</span>
                </div>
                <div class="modal-body">
                 <form action="" method="get">
                        <input name="titulo" id="input-titulo-tarea" placeholder="Titulo de la tarea" type="text" required="required" ><br>
                        <label for="mensaje"> <strong>Descripción</strong> </label>     <br>
                        <textarea  required="required" name="mensaje" id="mensaje" cols="55" rows="10"></textarea>  <br>

                        <label for="fecha"> <strong>Fecha</strong> </label><br>

<input required="required" type="date" id="fecha" name="fecha"
      
       min="2022-01-01" max="3000-01-01"> <br>

       <label for="color"> <strong>Color</strong> </label><br>

<select required="required" name="color" id="color">

  <option value="#9795FE">Morado</option>
  <option value="#9ce9ef">Azul</option>
  <option value="#8bf4cc">Verde</option>
  
</select> <br> <br>
                        <input type="submit" class="submit-notas" value="Guardar ">
                        <input type="hidden" name="n" value="guardar"> 
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<!-- Aparecen las notas-->

    <?php
     if(!empty($dato2)):
        foreach($dato2 as $key2 => $value2)
            foreach($value2 as $v2):?>
                    <div class="grid--recuadro " style="background-color:white ">
                        
                        <p><?php echo $v2['descripcion_anotaciones'] ?> </p>
                        <p>
                            <div class="contenedor-iconos2">
                                  <a href="index.php?n=editar_nota&id=<?php echo $v2['id']?>"><i class="fa-solid fa-pen-to-square iconos2"></i></a>
                            <a href="index.php?n=archivar_nota&id=<?php echo $v2['id']?>"><i class="fa-solid fa-box-archive iconos2"></i></a>
                            <a href="index.php?n=papelera_nota&id=<?php echo $v2['id']?>"><i class="fa-solid fa-trash-can iconos2"></i></a>  
                            <a href="index.php?n=eliminar_nota&id=<?php echo $v2['id']?>" onclick="return confirm('¿Estas seguro de eliminar?'); false"><i class="fa-solid fa-circle-xmark iconos2"></i></a> 
                            </div>
                        </p>
                       
                       
                    </div>
         <?php endforeach; ?>
     <?php else: ?>            
     <?php endif ?>


    <!--MODAL PARA CREAR NOTA-->
    
    <div id="miModal2" class="modal">
        <div class="flex" id="flex2">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    
                    <span class="close" id="close2"> Cerrar</span>
                </div>
                <div class="modal-body">
<form action="" method="get">
    <label for="descripcion_anotaciones"> <strong>Nota</strong> </label>        <br>
                    <textarea  required="required" name="descripcion_anotaciones" id="descripcion_anotaciones" cols="55" rows="10"></textarea>  <br>
                    <input class="submit-notas"  type="submit"  value="Guardar ">
                    <input type="hidden" name="n" value="guardar_nota"> 

</form>

                
                </div>
            </div>
        </div>
    </div>
 </div>
 </div>
     
 <script src="vista/script.js"></script>
  <!-- <?php
require_once('layouts/footer.php');
?>
 -->



 