<?php
require_once ('./varError.php');
//Si se presiona el boton enviar
if (isset($_POST['aceptar'])) {
    // ----------NOMBRE-----------
    if (isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        //Si el nombre de nombre esta vacio, mostrar mensaje.
        if (empty(trim($nombre))) {
            $nombreError ="<span class='error'>* Campo obligatorio de completar (vacio)</span>";
            $error = true;
            //Si el numero de caracteres es mayor a 120 o menor a 3 caracteres mostrar mensaje.
        } elseif (strlen($nombre) > 20 || (strlen($nombre) < 3)) {
            $nombreError ="<span class='error'>* Ingresó un nombre inválido (caracteres inválidos)</span>";
            $error = true;
        } else { 
            //Si es numerico, mostrar mensaje.
            if (is_numeric($nombre)) {
                $nombreError ="<p class='error'>* Ingresó un nombre inválido (sin números)</p>";
                $error = true;
            }
        }
    }
    //----------APELLIDO----------
    if (isset($_POST['apellido'])){
        $apellido = $_POST['apellido'];
        //Si el apellido de apellido esta vacio, mostrar mensaje.
        if (empty(trim($apellido))) {
            $apellidoError ="<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
            //Si el numero de caracteres es mayor a 120 o menor a 3 caracteres mostrar mensaje.
        } elseif (strlen($apellido) > 20 || (strlen($apellido) < 3)) {
            $apellidoError ="<p class='error'>* Ingresó un apellido inválido (caracteres inválidos)</p>";
            $error = true;
        } else { 
            //Si es numerico, mostrar mensaje.
            if (is_numeric($apellido)) {
                $apellidoError ="<p class='error'>* Ingresó un apellido inválido (sin números)</p>";
                $error = true;
            }
        }
    }
    //----------EMAIL-------------
    if (isset($_POST['email'])){
        $email = $_POST['email'];
        //Si el nombre de usuario(email) esta vacio, mostrar mensaje.
        if (empty(trim($email))) {
            $emailError ="<br><p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
            //Si el numero de caracteres es mayor a 120 mostrar mensaje.
        }elseif (strlen($email) > 120) {
            $emailError ="<p class='error'>* ingresó un e-mail inválido (Supero 120 caracteres)</p>";
            $error = true;
        }else{        
            //Filtra una variable con el filtro que se indique, Filtro direccion de e-mail valido"
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError ="<p class='error'>* Ingresó un e-mail inválido (sin @ y/o . algo)</p>";
                $error = true;
            }
        }
        }else{
            //no existe, hay error
            $emailError ="<p class='error'>* Debe ingresar un e-mail</p>";
            $error = true;
            $email = null;
    }
    //----------DNI---------------
    if (isset($_POST['dni'])){
        $dni = $_POST['dni'];
        //Si el dni esta vacio, mostrar mensaje.
        if (empty(trim($dni))) {
            $dniError ="<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
        } elseif (strlen($dni) > 9 ||(strlen($dni) < 8)) {
            $dniError ="<p class='error'>* ingresó un dni inválido (Número de caracteres incorrectos)</p>";
            $error = true;
        }
    }
    //----------TELEFONO----------
    if (isset($_POST['telefono'])){
        $telefono = $_POST['telefono'];
        //Si el telefono esta vacio, mostrar mensaje.
        if (empty(trim($telefono))) {
            $telefonoError ="<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
        } elseif (strlen($telefono) > 12 ||(strlen($telefono) < 6)) {
            $telefonoError ="<p class='error'>* ingresó un teléfono inválido (Número de caracteres incorrectos)</p>";
            $error = true;
        } else {
            //Si no es numerico, mostrar mensaje.
            if (!is_numeric($telefono)) {
                $telefonoError ="<p class='error'>* Ingresó un caracteres inválidos (solo  números)</p>";
                $error = true;
            }
        }
    }
    //----------FECHA NACIMIENTO----------
    if (isset($_POST['fechaNacimiento'])) {
        $fechaNacimiento = $_POST['fechaNacimiento'];
        //Si la fecha de nacimiento esta vacio, mostrar mensaje.
        if (empty($fechaNacimiento)) {
            $fechaNacimientoError ="<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
        } else {
            $fechaAhora = date('Y-m-d');
            $fechaNacimiento = date('Y-m-d');
            (strtotime($fechaAhora) > strtotime($fechaAhora));
            $fechaNacimientoError ="<p class='error'>* Seleccione una fecha valida</p>";
            $error = true;
        }
    }

    //----------DIRECCION---------
    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
        //Si el nombre de direccion esta vacio, mostrar mensaje.
        if (empty(trim($direccion))) {
            $direccionError ="<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            //Si el numero de caracteres es mayor a 30 o menor a 3 caracteres mostrar mensaje.
            $error = true;
        } elseif (strlen($direccion) > 30 || (strlen($direccion) < 2)) {
            $direccionError ="<p class='error'>* Ingresó una dirección inválida (caracteres inválidos)</p>";
            $error = true;
        } 
    }
    //----------CODIGO POSTAL-----
    if (isset($_POST['codigoPostal'])){
        $codigoPostal = $_POST['codigoPostal'];
        //Si el código Postal  esta vacio, mostrar mensaje.
        if (empty($codigoPostal)) {
            $codigoPostalError ="<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
            //Si el numero de caracteres es mayor a 8 o menor a 4 caracteres mostrar mensaje.
        } elseif (strlen($codigoPostal) > 7 || (strlen($codigoPostal) < 4)) {
            $codigoPostalError ="<p class='error'>* Ingresó un código Postal inválida (caracteres inválidos)</p>";
            $error = true;
        } else {
            //Si no es numerico, mostrar mensaje.
            if (!is_numeric($codigoPostal)) {
                $codigoPostalError ="<p class='error'>* Ingresó un caracteres inválidos (solo  números)</p>";
                $error = true;
            }
        }
    }
    //----------CIUDAD------------
    if (isset($_POST['ciudad'])){
        $ciudad = $_POST['ciudad'];
        //Si el campo ciudad esta vacio, mostrar mensaje.
        if (empty(trim($ciudad))) {
            $ciudadError ="<p class='error'>* Campo obligatorio de completar. (vacio)</p>";
            $error = true;
            //Si el numero de caracteres es mayor a 20 o menor a 3 caracteres mostrar mensaje.
        } elseif (strlen($ciudad) > 20 || (strlen($ciudad) < 3)) {
            $ciudadError ="<p class='error'>* Ingresó cantidad de caracteres inválido.</p>";
            $error = true;
        } else { 
            //Si es numerico, mostrar mensaje.
            if (is_numeric($ciudad)) {
                $ciudadError ="<p class='error'>* Ingresó un caracteres inválidos (sin números)</p>";
                $error = true;
            }
        }
    }
    //----------PROVINCIA---------

        if (empty($_POST['provincia']) == "000") {
            $provinciaError = "<p class='error'>* Campo obligatorio para seleccionar (vacio)</p>";
        }

    //----------PASSWORD----------
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if (empty(trim($password))) {
            $passwordError = "<p class='error'>* Campo obligatorio de completar (vacio)</p>";
            $error = true;
        }
        if (strlen($password) < 8 || (strlen($password) > 12)) {
            $passwordError = "<p class='error'>* Campo Incorrecto (longitud)</p>";
            $error = true;
        } 
    }
    //----------REPASSWORD-------- 
    if (isset($_POST['rePassword'])) {
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        if ($password != $rePassword) {
            $rePasswordError = "<p class='error'>* La confirmacion no es igual al password.</p>";
            $error = true;
        } elseif 
        (empty(trim($rePassword))) {
                $rePasswordError = "<p class='error'>* Campo obligatorio de completar</p>";
                $error = true;
            }
    }
    //----------CHECKED-----------
        if (isset($_POST['condicion']) && $_POST['condicion'] == 1) {
        } else {
            $condicionError = "<p class='error'>* Debe aceptar los terminos y condiciones.</p>";
            $error = true;
        }
    }
?>



<!-- /*Validaciones de fecha_na*/
			if (isset($_POST['fecha_na'])) {

				# Establecer la zona horaria a Argentina
				date_default_timezone_set('America/Argentina/Buenos_Aires');

				$fecha_na = trim($_POST['fecha_na']);
				#comprobamos que el campo no este vacio 
				if (empty($fecha_na)) {
					$error = true;
					$error_msg['fecha_na'] = 'Por favor, ingrese una fecha de nacimiento';
				}else{
					# Obtener la fecha actual
					$fechaActual = new DateTime();
					# Crear un objeto DateTime a partir de la fecha de nacimiento
					$fechaNacimientoObj = new DateTime($fecha_na);

					# Comparar la fecha de nacimiento con la fecha actual
					if ($fechaNacimientoObj > $fechaActual) {
						$error = true;
						$error_msg['fecha_na'] = 'La fecha de nacimiento es mayor a la fecha actual';
					} else {
					    # Calcular la diferencia en años entre la fecha de nacimiento y la fecha actual
					    $diferencia = $fechaActual->diff($fechaNacimientoObj);
					    $edad = $diferencia->y;

					    # Verificar si la persona tiene más de 18 años
					    if ($edad < 18) {
							$error = true;
							$error_msg['fecha_na'] = 'Debes ser mayor de 18 años';
					    }
					}
				}
			}else{
				$error = true;
				$error_msg['fecha_na'] = 'Por favor, ingrese una fecha de nacimiento';
			}
		/*Fin -- Validaciones de fecha_na*/ -->