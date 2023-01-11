<?php

require_once "../Filehandler/Ifilehandler.php";
require_once "../Filehandler/Jsonfhandler.php";
require_once "../database/context.php";
require_once "User.php";
require_once "UserService.php";

$result = null;
$message = "";

session_start();

$service = new UserService("../database");

if(isset($_POST['userName']) && isset($_POST['contrasena'])){

    $result = $service->Login($_POST['userName'],$_POST['contrasena']);

    if($result != null){

        $_SESSION['user'] = $result;
        header("Location: ../PagesAdmin/adminp.php");
        exit();

    }else{
        $message = "Usuario o contraseña incorrect@s";
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Inicio de sesion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/login.css" rel="stylesheet" type="text/css">
  </head>
  <body class="text-center">

    <form class="form-signin" action="login.php" method="POST">

    <?php if($message!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message ?>
  </div>
<?php endif; ?>

  <img class="mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Inicio de sesion</h1>
  <label for="userName" class="sr-only">Nombre de usuario</label>
  <input type="text" id="userName" class="form-control" placeholder="Correo electronico" name="userName" required autofocus>
  <label for="contrasena" class="sr-only">Contraseña</label>
  <input type="password" id="contrasena" class="form-control" placeholder="Contraseña" name="contrasena" required>
  <div class="checkbox mb-3">

  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesion</button>
  <a class="btn btn-lg btn-warning btn-block" href="../PagesLector/PagesInicial/indexInicio.php">Volver a inicio</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
</form>
</body>
</html>