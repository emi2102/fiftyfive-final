<?php
    require 'modelo/index.php';

  class ModeloController{
        private $model;
        public function __construct(){
            $this->model=new Modelo();
        }
        // Iniciar en la pagina de inicio
        static function iniciar(){
          require_once("vista/login.php");
        }
          static function inicio(){
          require_once("vista/index.php");
        }

        // RESTABLECER CONTRASENIA
        static function restablecer(){
  
          require_once("vista/restablecer.php");
       }

       //Iniciar en la pagina principal
       static function principal(){
        require_once("vista/principal.php");
      }
      //Datos personales
      static function personales(){ //DATOS PERSONALES
        require_once("vista/DatosPersonales.php");
      }
  
        // mostrar
        public static function index(){
            $datos=new Modelo();
            $datos2=new Modelo(); //para anotaciones
            $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->mostrar("tarea",0,$datix);
            $data=$datos2->traerIdSesiones("sesiones"); //para anotaciones
            $datix=$datos2->traerIdUser("sesiones",$data); //para anotaciones
            $dato2=$datos2->mostrar_nota("anotaciones",0,$datix); //para anotaciones
            require_once("vista/tareas.php");
           }
      
        // NUEVO USUARIO, REGISTRO
        static function nuevo(){
           require_once("vista/nuevo.php");
        }

        // Guardar
        static function guardar(){
          $titulo=$_REQUEST['titulo'];
          $mensaje=$_REQUEST['mensaje'];
          $color=$_REQUEST['color'];
          $fecha_inicio=date('d/m/y');
          $fecha_finalizacion=$_REQUEST['fecha'];
            $condicion=0;
            $usuario=new Modelo();
            $datu=$usuario->traerIdSesiones("sesiones");
            $datix=$usuario->traerIdUser("sesiones",$datu);
            $data="'".$titulo."','".$mensaje."','".$fecha_inicio."','".$fecha_finalizacion."','".$color."',".$condicion.",". $datix;
            
              $dato=$usuario->insertar("tarea",$data);
              header('location:'.'index.php?n=index');
         }

        //  Guardar datos de usuario
         static function guardaru(){
          $nombre=$_REQUEST['nombre'];
          $apellido=$_REQUEST['apellido'];
           $correo=$_REQUEST['correo'];
          $n_usuario=$_REQUEST['n_usuario'];
          $contrasenia=$_REQUEST['contrasenia'];
          $data="'".$nombre."','".$apellido."','".$correo."','".$n_usuario."','".$contrasenia."'";
         
          $usuario=new Modelo();
          $condicion="nombre='".$nombre."' AND apellido='".$apellido."' AND correo='".$correo."' AND n_usuario='".$n_usuario."' AND clave='".$contrasenia."'";

            if($usuario->validar_User_existente("usuario","n_usuario='".$n_usuario."'","correo='".$correo."'")){
              header('location:'.ModeloController::nuevo());
               echo "<script>alert('el nombre de usuario: $n_usuario o el correo: $correo ya estan siendo utilizados');</script>";
            }else{
              $dato=$usuario->insertar("usuario",$data);
              $datux=$usuario->traerId("usuario",$condicion);
              $dato=$usuario->insertar("sesiones",$datux);
               header('location:'.'index.php?n=iniciar');
            }
       } 

      //  actualizar usuario
      static function actualizaru(){
           
        $correo=$_REQUEST['correo'];
        $contrasenia=$_REQUEST['contrasenia'];
        $data   = "clave='".$contrasenia."'";
         $datos=new Modelo();
         if($datos->validar_User_existente2("usuario","correo= '".$correo."'" )){
            $mostrar=$datos->traerid("usuario","correo= '".$correo."'");
            $dato=$datos->actualizar("usuario",$data,"id=".$mostrar);
            header('location:'.ModeloController::iniciar());
            echo "<script>alert('La contraseña fue cambiada exitosamente');</script>";
         }
         else{
          header('location:'.ModeloController::restablecer());
          echo "<script>alert('El correo: $correo  no existe');</script>";
         }
      
        }

     //login 
      static function login(){
        $n_usuario=$_REQUEST['n_usuario'];
        $contrasenia=$_REQUEST['contrasenia'];
         $datos=new Modelo();
         $data="n_usuario='".$n_usuario."' AND clave='".$contrasenia."'";
         $dato=$datos->login("usuario",$data);
        
        if($dato==true){
            $datu=$datos->traerId("usuario",$data);
            $datix=$datos->insertar("sesiones",$datu);
             header('location:'.'index.php?n=inicio');
        }
        else{
            
          header('location:'.ModeloController::iniciar());
          echo "<script>alert ('la contraseña o el nombre de usuario es incorrecto');</script>";

        
        }
      }


        // inciar busqueda
        static function buscar(){
          $titulo=$_REQUEST['titulo'];
          $data="titulo='".$titulo."'";
          $usuario=new Modelo();
            $dato=$usuario->mostrar2("tarea",$data);
            require_once("vista/tareas.php");
       }
          // editar
        static function editar(){
          $id=$_REQUEST['id'];
          $datos=new Modelo();
          $dato=$datos->mostrar2("tarea","id=".$id);
          require_once("vista/editar.php");
         }
         // editar DESDE ARCHIVADOS
        static function editar2(){
          $id=$_REQUEST['id'];
          $datos=new Modelo();
          $dato=$datos->mostrar2("tarea","id=".$id);
          require_once("vista/editar2.php");
         }
 
         // actualizar
         static function actualizar(){
            $id=$_REQUEST['id'];
             $titulo=$_REQUEST['titulo'];
            $mensaje=$_REQUEST['mensaje'];
            $color=$_REQUEST['color'];
            $fecha_finalizacion=$_REQUEST['fecha'];
            $data="titulo='".$titulo."',descripcion='".$mensaje."',color='".$color."',fecha_finalizacion='".$fecha_finalizacion."'";
             $datos=new Modelo();
             $dato=$datos->actualizar("tarea",$data,"id=".$id);
             header('location:'.'index.php?n=index');
          }
          // ACTUALIZAR TAREAS EN ARCHIVADOS
          static function actualizar2(){
            $id=$_REQUEST['id'];
             $titulo=$_REQUEST['titulo'];
            $mensaje=$_REQUEST['mensaje'];
            $color=$_REQUEST['color'];
            $fecha_finalizacion=$_REQUEST['fecha'];
            $data="titulo='".$titulo."',descripcion='".$mensaje."',color='".$color."',fecha_finalizacion='".$fecha_finalizacion."'";
             $datos=new Modelo();
             $dato=$datos->actualizar("tarea",$data,"id=".$id);
             header('location:'.'index.php?n=paginaArch');
          }
          static function archivar(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->archivar("tarea","id=".$id,1);
            header('location:'.'index.php?n=index');
          } 
          static function sacarArch(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $datos2=new Modelo();//anotaciones
             $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->archivar("tarea","id=".$id,0);
             $dato=$datos->mostrar("tarea","1",$datix);

             $data=$datos2->traerIdSesiones("sesiones");//anotaciones
             $datix=$datos2->traerIdUser("sesiones",$data);//anotaciones
             $dato2=$datos2->archivar("anotaciones","id=".$id,0);//anotaciones
              $dato2=$datos2->mostrar_nota("anotaciones","1",$datix);//anotaciones
            require_once("vista/archivados.php");
          }
          static function paginaArch(){
            $datos=new Modelo();
            $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->mostrar("tarea",1,$datix);

            $datos2=new Modelo();//anotaciones
            $data=$datos2->traerIdSesiones("sesiones");//anotaciones
            $datix=$datos2->traerIdUser("sesiones",$data);//anotaciones
            $dato2=$datos2->mostrar_nota("anotaciones",1,$datix);//anotaciones
            require_once("vista/archivados.php");
          } 

          static function papeleraArch(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
           
            $dato=$datos->archivar("tarea","id=".$id,2);
            
            header('location:'.'index.php?n=paginaArch');
          }

          // PAPELERA
          static function papelera(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $datos2=new Modelo();
            $dato=$datos->archivar("tarea","id=".$id,2);
            $dato2=$datos2->archivar("anotaciones","id=".$id,2);
            header('location:'.'index.php?n=index');
          } 
          static function sacarPapelera(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $datos2=new Modelo();//anotaciones
             $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->archivar("tarea","id=".$id,0);
             $dato=$datos->mostrar("tarea","2",$datix);

             $data=$datos2->traerIdSesiones("sesiones"); //anotaciones
             $datix=$datos2->traerIdUser("sesiones",$data); //anotaciones
             $dato2=$datos2->archivar("anotaciones","id=".$id,0); //anotaciones
              $dato2=$datos2->mostrar_nota("anotaciones","2",$datix); //anotaciones
            require_once("vista/papelera.php");
          }
          static function paginaPapelera(){
            $datos=new Modelo();
            $datos2=new Modelo();//anotaciones
            $data=$datos->traerIdSesiones("sesiones");
            $datix=$datos->traerIdUser("sesiones",$data);
            $dato=$datos->mostrar("tarea",2,$datix);

            $data=$datos2->traerIdSesiones("sesiones"); //anotaciones
            $datix=$datos2->traerIdUser("sesiones",$data); //anotaciones 
            $dato2=$datos2->mostrar_nota("anotaciones",2,$datix); //anotaciones
            require_once("vista/papelera.php");
          }
        // Eliminar
          static function eliminar(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->eliminar("tarea","id=".$id);
            header('location:'.'index.php?n=index');
         }
           // Eliminar para archivados
           static function eliminarArchivado(){
            $id=$_REQUEST['id'];
            $datos=new Modelo();
            $dato=$datos->eliminar("tarea","id=".$id);
            header('location:'.'index.php?n=paginaArch');
         }


         //DATOS PERSONALES    

        static function actualizaru2(){
        
          $nombre=$_REQUEST['nombre'];
          $apellido=$_REQUEST['apellido'];
          $n_usuario=$_REQUEST['n_usuario'];
          $correo=$_REQUEST['correo'];
          $contrasenia=$_REQUEST['contrasenia'];
          $data="nombre='".$nombre."',apellido='".$apellido."',n_usuario='".$n_usuario."',correo='".$correo. "',clave='".$contrasenia."'";
           $datos=new Modelo();
           $datu=$datos->traerIdSesiones("sesiones");
      $datix=$datos->traerIdUser("sesiones",$datu);
            $dato=$datos->actualizar("usuario",$data,"id=".$datix);
            header('location:'.'index.php?n=personales');
             
          }

//anotaciones
          // Guardar   nota
   static function guardar_nota(){
    $descripcion=$_REQUEST['descripcion_anotaciones'];
      $condicion=0;
      $usuario=new Modelo();
      $datu=$usuario->traerIdSesiones("sesiones");
      $datix=$usuario->traerIdUser("sesiones",$datu);
      $data="'".$descripcion."',".$condicion.",".$datix;
        $dato2=$usuario->insertar("anotaciones",$data);
        header('location:'.'index.php?n=index');
   }

    // Eliminar nota
    static function eliminar_nota(){
      $id=$_REQUEST['id'];
      $datos2=new Modelo();
      $dato2=$datos2->eliminar("anotaciones","id=".$id);
      header('location:'.'index.php?n=index');
   }
   
//llevar nota a papelera
   static function papelera_nota(){
    $id=$_REQUEST['id'];
    $datos2=new Modelo();
    $dato2=$datos2->archivar("anotaciones","id=".$id,2);
    header('location:'.'index.php?n=index');
  } 
//archivar nota
  static function archivar_nota(){
    $id=$_REQUEST['id'];
    $datos2=new Modelo();
    $dato2=$datos2->archivar("anotaciones","id=".$id,1);
    header('location:'.'index.php?n=index');
  } 
    // Eliminar nota en archivados
    static function eliminarArchivado_nota(){
      $id=$_REQUEST['id'];
      $datos2=new Modelo();
      $dato2=$datos2->eliminar("anotaciones","id=".$id);
      header('location:'.'index.php?n=paginaArch');
   }

     // editar nota
     static function editar_nota(){
      $id=$_REQUEST['id'];
      $datos2=new Modelo();
      $dato2=$datos2->mostrar_nota2("anotaciones","id=".$id);
      require_once("vista/editar_nota.php");
     }

        // editar nota DESDE ARCHIVADOS
        static function editar_nota2(){
          $id=$_REQUEST['id'];
          $datos2=new Modelo();
          $dato2=$datos2->mostrar_nota2("anotaciones","id=".$id);
          require_once("vista/editar_nota2.php");
         }
//actualizar nota en papelera y tareas
     static function actualizar_nota(){
      $id=$_REQUEST['id'];
      $descripcion=$_REQUEST['descripcion_anotaciones'];
      $data="descripcion_anotaciones='".$descripcion."'";
       $datos2=new Modelo();
       $dato2=$datos2->actualizar("anotaciones",$data,"id=".$id);
       header('location:'.'index.php?n=index');
    }

    //actualizar nota en archivados
    static function actualizar_nota2(){
      $id=$_REQUEST['id'];
      $descripcion=$_REQUEST['descripcion_anotaciones'];
      $data="descripcion_anotaciones='".$descripcion."'";
       $datos2=new Modelo();
       $dato2=$datos2->actualizar("anotaciones",$data,"id=".$id);
       header('location:'.'index.php?n=index');
    }



    }
?>