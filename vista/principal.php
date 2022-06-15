<?php
  require_once("layouts/header1.php");
?>


        <nav>
            <a href="index.php?n=nuevo">Registro</a>
            <a href="index.php?n=iniciar">Iniciar sesión</a>
        </nav>
        <section class="textos-header">
            <h1>Fifty Five</h1>
            <h2>Organizate con Fifty Five</h2>
        </section>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestro producto</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="vista/img/Nosotros.png" alt=""class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>Te ayudamos con tu día a día</h3>
                    <p>Fifty five es una página capaz de organizar y ayudarte a planificar todas tus tareas y notas, acá no solo puedes guardar dicha información sino que también le puedes agregar una fecha y un color para que sea más fácil de identificar.</p>
                    <h3><span>2</span>Fácil de manejar</h3>
                    <p>Contamos con una interfaz amigable con el usuario, ya que tenemos un modelo muy práctico y sencillo a la hora de usarlo, no esperes más y únete a la familia de Fifty five.</p>   
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Galeria</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="vista/img/Pagina inicio (1).png" alt="">
                        <div class="hover-galeria">
                            <p>Algunos servicios</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="vista/img/Panel de tareas y anotaciones.png" alt="">
                        <div class="hover-galeria">
                            <p>Algunos servicios</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="vista/img/Pagina de archivados (1).png" alt="">
                        <div class="hover-galeria">
                            <p>Algunos servicios</p>
                        </div>
                    </div>
                </div>
            </div>        
        </section>
        <section class="cliente contenedor">
            <h2 class="titulo">Opiniones de nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="vista/img/Avatar1.png" alt="">
                    <div class="contenido-texto-card">
                        <h4>Karla</h4>
                        <p>Muy buena pagina, me ayuda a mantenerme al día con mis tareas.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="vista/img/avatar2.png" alt="">
                    <div class="contenido-texto-card">
                        <h4>Martín</h4>
                        <p>Me gusto mucho la parte de archivados y el tener la opción de buscar una tarea por su título.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>



<?php 
require_once("layouts/footer2.php");
?>