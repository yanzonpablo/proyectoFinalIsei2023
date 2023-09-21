<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logoCapacitacion.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/iconopantalla.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="js/questions.js"></script>
    <script src="js/loginpopup.js"></script>
    <title>CAPACITACION</title>
</head>

<body>
<?php include_once "nav.php" ?>
    <main>
        <?php require_once('slider.php') ?>
        <!-- <div class="img-content">
            <img class="imgcabecera" src="images/auto.jpg" alt="capacitacion">
        </div> -->
        <div class="formacion">
            <p class="titulos">UNA FORMA DISTINTA DE APRENDER</p>
            <p class="parrafoFormacion">Capacitate con profesionales de excelencia. No te pierdas la oportunidad de
                aprender de la mano de técnicos e ingenieros que han perfeccionado sus conocimientos hasta volverse
                referentes en sus rubros. Comenzá a perfeccionar hoy tu trabajo de mañana.</p>
            <a href="#listaCursos" class="btn-curso">VER CURSOS AQUÍ</a>
        </div>
        <?php var_dump($_SESSION["rol_usuario"]); ?>
        <!-- <div class="separacion" id="listaCursos"></div> -->
        <div class="iconospantalla">
            <div class="publi-fila">
                <article>
                    <div class="publi-container">
                        <div class="publi-item">
                            <div class="imagen">
                                <img class="iconpubli" src="images/1vanguardia.png" alt="vanguardia">
                            </div>
                            <p class="publi-plan">A LA VANGUARDIA</p>
                            <p class="publi-p">Nuestros cursos están orientados al presente y futuro de la reparación
                                automotriz.</p>
                        </div>
                    </div>
                </article>

                <article>
                    <div class="publi-container">
                        <div class="publi-item">
                            <div class="imagen">
                                <img class="iconpubli" src="images/2demandalaboral.png" alt="vanguardia">
                            </div>
                            <p class="publi-plan">DEMANDA LABORAL </p>
                            <p class="publi-p">Empieza tu propio emprendimiento o adquirí las herramientas para avanzar
                                en tu futuro.</p>
                        </div>
                    </div>
                </article>

                <article>
                    <div class="publi-container">
                        <div class="publi-item">
                            <div class="imagen">
                                <img class="iconpubli" src="images/3reparacion.png" alt="vanguardia">
                            </div>
                            <p class="publi-plan">REPARACIONES REALES</p>
                            <p class="publi-p">Capacitate conociendo casos reales de reparaciones realizadas en nuestros
                                talleres y laboratorios.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="publi-fila">
                <article>
                    <div class="publi-container">
                        <div class="publi-item">
                            <div class="imagen">
                                <img class="iconpubli" src="images/4herramientas.png" alt="vanguardia">
                            </div>
                            <p class="publi-plan">HERRAMIENTAS</p>
                            <p class="publi-p">Usamos y recomendamos el instrumental necesario para diagnósticos y
                                reparaciones.</p>
                        </div>
                    </div>
                </article>

                <article>
                    <div class="publi-container">
                        <div class="publi-item">
                            <div class="imagen">
                                <img class="iconpubli" src="images/5experiencia.png" alt="vanguardia">
                            </div>
                            <p class="publi-plan">EXPERIENCIA</p>
                            <p class="publi-p">Nuestros instructores poseen amplia experiencia práctica y son referentes
                                en sus rubros.</p>
                        </div>
                    </div>
                </article>

                <article>
                    <div class="publi-container">
                        <div class="publi-item">
                            <div class="imagen">
                                <img class="iconpubli" src="images/6recursos.png" alt="vanguardia">
                            </div>
                            <p class="publi-plan">RECURSOS</p>
                            <p class="publi-p">Nuestros cursos están orientados al presente y futuro de la reparación
                                automotriz.</p>
                        </div>
                    </div><div id="listaCursos"></div>
                    </article>    
                </div>
        </div>
        <!-- <div class="separacion"></div> -->
        <!-- --------------- CARDS INICIO-------------- -->
        <div class="formacion">
            <p class="titulos">ENCONTRÁ TU CURSO ACÁ</p>
            <p class="encontracursos">*Todos los cursos son <strong>"sin costo"</strong> para aportantes y asociados a las <strong>Cámaras adheridas.</strong> </p>
        </div>
        <div class="table-container" id="listaCursos">
            <a href="cursosBases.php" class="table-item">
                <h3 class="table-plan"> CURSOS BASE E INCLUSION SOCIAL </h3>
                <article class="table-content">
                    <p class="table-p">Cursos SIN costo, orientados en competencias laborales, avaldos por el MTEySS para titulares, empleados, desempleados y público en general (a través de las cámaras cabecera de la región F.A.A.T.R.A.).
                    </p>
                    <p class="btnCursos">INGRESAR</p>
                </article>
            </a>
            <a href="cursosPerfeccionamientoT.php" class="table-item">
                <h3 class="table-plan"> PERFECCIONAMIENTO PROFESIONAL </h3>
                <article class="table-content">
                    <p class="table-p">Cursos sobre funcionamiento de componentes, interpretación de circuitos
                        eléctricos, conexionados, análisis y diagnóstico de fallas en los sistemas del automotor.
                        Requiere conocimientos base.</p>
                        <p class="btnCursos">INGRESAR</p>
                    </article>
            </a>
            <a href="cursosPerfeccionamientoNoT.php" class="table-item">
                <h3 class="table-plan"> PERFECCIONAMIENTO NO PROFESIONAL </h3>
                <article class="table-content">
                    <p class="table-p">Cursos para el desempeño organizacional de la empresa automotriz, identificación
                        de las falencias de la empresa, metodologías de trabajo, calculo de costos, seguridad e higiene,
                        etc.</p>
                        <p class="btnCursos">INGRESAR</p>
                    </article>
            </a>
            <a href="charlasPresentacionTecnica.php" class="table-item">
                <h3 class="table-plan"> CHARLAS TECNICAS Y COMERCIALES</h3>
                <article class="table-content">
                    <p class="table-p">Empresas del rubro presentan productos, características, aplicaciones y manipulación de sus
                        líneas de productos, realizando recomendaciones y demostraciones prácticas en vivo.</p>
                </article>
                <p class="btnCursos">INGRESAR</p>
            </a>
        </div>
        <!-- --------------- CARDS FIN-------------- -->
        <div class="separacion1"></div>
        <?php require('slidersCamaras.php') ?>
        <div class="separacion"></div>
        <!-- ---------------PREGUNTAS FRECUENTES INICIO-------------- -->
        <section class="preguntas limited-container">
            <h2 class="subtitle">Preguntas Frecuentes</h2>
            <p class="preguntas_paragraph">En las siguientes secciones podrás encontrar información sobre nuestros
                cursos. Para ello hemos reunido una selección de las preguntas más frecuentes que recibimos por parte de
                los interesados a lo largo de nuestra experiencia en la formación.

            </p>
            <section class="preguntas_container">

                <article class="preguntas_padding">
                    <div class="preguntas_answer">
                        <h3 class="preguntas_title">¿Cuales son los pasos para inscribirme?
                            <span class="preguntas_arrow">
                                <img src="images/arrow.svg" alt="Arrow icon" class="preguntas">
                            </span>
                        </h3>
                        <p class="preguntas_show">
                            Hacer click en el botón <strong>INGRESAR</strong>, luego loguearse y a continuación seleccione el curso de su interes. Luego recibirá en su  correo electrónico la confirmación de inscripción al curso.
                        </p>

                    </div>
                </article>

                <article class="preguntas_padding">
                    <div class="preguntas_answer">
                        <h3 class="preguntas_title">Estoy inscripto en un curso. ¿Cuándo y cómo accedo?
                            <span class="preguntas_arrow">
                                <img src="images/arrow.svg" alt="Arrow icon" class="preguntas">
                            </span>
                        </h3>
                        <p class="preguntas_show">Al momento de la inscripción a un curso le llegará de forma inmediata un correo electrónico con el link de acceso a dicho curso.</p>
                    </div>
                </article>

                <article class="preguntas_padding">
                    <div class="preguntas_answer">
                        <h3 class="preguntas_title">¿En qué horarios se cursa? ¿Hay horarios fijos?
                            <span class="preguntas_arrow">
                                <img src="images/arrow.svg" alt="Arrow icon" class="preguntas">
                            </span>
                        </h3>
                        <p class="preguntas_show">Los cursos On-line comienzan a las 19:30 Hs., salvo excepciones.</p>
                    </div>
                </article>
                <article class="preguntas_padding">
                    <div class="preguntas_answer">
                        <h3 class="preguntas_title">¿Cómo está estructurado el curso?
                            <span class="preguntas_arrow">
                                <img src="images/arrow.svg" alt="Arrow icon" class="preguntas">
                            </span>
                        </h3>
                        <p class="preguntas_show">Se sigue un temario preestablecido, el mismo se puede ver ingresando a la web.</p>
                    </div>
                </article>

                <article class="preguntas_padding">
                    <div class="preguntas_answer">
                        <h3 class="preguntas_title">¿Hasta cuándo tengo tiempo de inscribirme en un curso?
                            <span class="preguntas_arrow">
                                <img src="images/arrow.svg" alt="Arrow icon" class="preguntas">
                            </span>
                        </h3>
                        <p class="preguntas_show">Las inscripciones están habilitadas hasta 48 Hs. antes del comienzo del curso.</p>
                    </div>
                </article>
                <article class="preguntas_padding">
                    <div class="preguntas_answer">
                        <h3 class="preguntas_title">¿Qué certificado me otorga el curso?
                            <span class="preguntas_arrow">
                                <img src="images/arrow.svg" alt="Arrow icon" class="preguntas">
                            </span>
                        </h3>
                        <p class="preguntas_show">Se entrega un certificado de asistencia al curso.</p>
                    </div>
                </article>
                <!-- ---------------PREGUNTAS FRECUENTES FIN-------------- -->
            </section>
    </main>
<?php include_once "footer.php" ?>
</body>

</html>