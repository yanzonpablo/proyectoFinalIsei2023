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
    <?php require_once ('nav.php') ?>
    <section class="section" >
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="logo-faatra">
            </div>
            <p class="title">Login</p>
            <form action="login.php" method="POST" class="form">
                <input type="text" class="inputUser" placeholder="Nombre de usuario">
                <input type="password" class="inputUser" placeholder="Contraseña">
                <div class="boxCheck">
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
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
</body>

</html>