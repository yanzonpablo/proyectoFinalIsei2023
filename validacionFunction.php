<?php
function validarCampo(string $campo, string $desc_campo = '', int $minCar = 0, int $max = 65000){
    $resultado = array('estado' => false,'msg' => '','campo' => '');
    if (!isset($_POST[$campo])) {
        $resultado['estado'] = true;
        $resultado['msg'] = 'Por favor ingrese el campo '. $desc_campo;
        $campo = '';
    }else{
        if (empty(trim($_POST['nombre']))) {
            $resultado['estado'] = true;
            $resultado['msg'] = "<span class='error'>Por favor ingrese un $desc_campo</span>";
        }
        elseif (is_numeric($_POST['nombre'])) {
            $resultado['estado'] = true;
            $resultado['msg'] = "<span class='error'>Tipo de caracteres inválidos.</span>";
            
        } else {
            if (strlen($_POST['nombre']) > 20 || (strlen($_POST['nombre']) <3)) {
                $resultado['estado'] = true;
                $resultado['msg'] = "<span class='error'>Número de caracteres inválidos.</span>";
            }
        }
        $campo = $_POST[$campo];
    }
    $campo = trim($campo);

    $resultado['campo'] = $campo;
    return  $resultado;
}
// validarCampo($campo = 'fecha_n','Fecha de nacimiento',$minCar = 3, $max = 30);
?>
