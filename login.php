<?php
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $pdo = new PDO("mysql:host=localhost;dbname=capacitacion", "root", "d79f2f87");

    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL 
    $query = "SELECT * FROM usuarios WHERE email = :username AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":username", $username);
    $statement->bindParam(":password", $password);
    $statement->execute();

    // Comprobar credenciales
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["rol_usuario"] = $row["rol_usuario"];

        if ($row["rol_usuario"] === 2) {
            header("location: panelControl.php");
        } else {
            header("location: index.php");
        }
    } else {

        $message = "Credenciales incorrectas";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logoCapacitacion.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>CAPACITACION</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php require_once('nav.php') ?>
    <section class="section">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="logo-faatra">
            </div>
            <p class="title">Login</p>
            <form action="login.php" method="POST" class="form">
                <input type="text" class="inputUser" name="username" placeholder="Nombre de usuario">
                <input type="password" class="inputUser" name="password" placeholder="Contraseña">
                <div class="boxCheck">
                    <?php if (!empty($message)) : ?>
                        <p>
                            <?= $message ?>
                        </p>
                    <?php endif; ?>
                    <input type="checkbox" placeholder="" name="rememberPass" class="check">Recordar contraseña
                </div>
                <div class="boxButton">
                    <button type="submit" class="button" value="">Ingrese
                </div>
            </form>
            <div>
                <span class="textRecovery">Olvido su contraseña?
                    <a href="#" class="recovery">Haga click aquí</a>
                </span>
            </div>
        </div>
    </section>

</body>

</html>