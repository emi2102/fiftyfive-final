<?php
require_once('layouts/header.php');
?>
 <div class="contenido">
        <div class="text">
<h2>Archivados</h2>
<hr>

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
                            <a href="index.php?n=editar2&id=<?php echo $v['id']?>"><i class="fa-solid fa-pen-to-square iconos2"></i></a>
                            <a href="index.php?n=sacarArch&id=<?php echo $v['id']?>"><i class="fa-solid fa-box-archive iconos2"></i></a>
                            <a href="index.php?n=papeleraArch&id=<?php echo $v['id']?>"><i class="fa-solid fa-trash-can iconos2"></i></a> 
                            <a href="index.php?n=eliminarArchivado&id=<?php echo $v['id']?>" onclick="return confirm('¿Estas seguro de eliminar?'); false"><i class="fa-solid fa-circle-xmark iconos2"></i></a> 
                            </div>
                        </p>
                    </div>
         <?php endforeach; ?>
     <?php else: ?>         

     <?php endif ?>

     <!--ANOTACIONES-->

    <?php
     if(!empty($dato2)):
      foreach($dato2 as $key2 => $value2)
             foreach($value2 as $v2):?>
                    <div class="grid--recuadro " style="background-color:white ">
                        
                        <p><?php echo $v2['descripcion_anotaciones'] ?> </p>
                         <p>
                         <div class="contenedor-iconos2">
                             <a href="index.php?n=editar_nota2&id=<?php echo $v2['id']?>"><i class="fa-solid fa-pen-to-square iconos2"></i></a>
                            <a href="index.php?n=sacarArch2&id=<?php echo $v2['id']?>"><i class="fa-solid fa-box-archive iconos2"></i></a>
                             <a href="index.php?n=papeleraArch2&id=<?php echo $v2['id']?>"><i class="fa-solid fa-trash-can iconos2"></i></a> 
                             <a href="index.php?n=eliminarArchivado_nota&id=<?php echo $v2['id']?>" onclick="return confirm('¿Estas seguro de eliminar?'); false"><i class="fa-solid fa-circle-xmark iconos2"></i></a> 
                                  
                             </div>
                         </p>
                       
                       
                 </div>
           <?php endforeach; ?>
     <?php else: ?>    

     <?php endif ?> 
     <?php
     if(empty($dato) && empty($dato2)):?>
        <div class="contenido">
                    <div class="text-archivos">
                        <i class="fa-solid fa-box-archive"></i>
                        <p>No se han archivado tareas o anotaciones aun</p>
                    </div>
                </div>
      <?php endif ?> 
        </div>
 </div>
 <script src="vista/script.js"></script>

<?php require_once('layouts/footer.php'); ?>

