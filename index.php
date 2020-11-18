<?php 
use models\UsuarioModel as UsuarioModel;

session_start();
require_once("models/UsuarioModel.php");
if(isset($_SESSION['usuario'])){
    $model = new UsuarioModel();
    $usuario = $model->getAllUsuarios();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- style.css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    </head>

<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12"></div>
            <div class="col l4 m4 s12">
                <!-- iniciio card --> 
            <div class="card">
            <div class="card-content">
            <i class="material-icons large">account_box</i>
            <h5>Acceso Usuario</h5>
            </div>

        <div class="card-action">
            <form action="controllers/LoginController.php" method="POST">
            <p class="red-text">
                
            <?php
             if(isset($_SESSION['error'])){
                 echo $_SESSION['error'];
                 unset($_SESSION['error']);
             }
            ?>
          </p>

    <!-- Rut del vendedor -->
        <div class="input-field">
            <input id="rut" type="text" name="rut">
            <label for="rut">Rut de usuario</label>
        </div>
    
    <!-- clave de acceso -->
        <div class="input-field">
          <input id="clave" type="password" name="clave">
          <label for="clave">Ingresa tu clave</label>
        </div>

    <!-- btn entrar -->
        <input type="hidden" name="estado" value="1">  
        <button class="btn black ancho-100">Entrar</button>
    
    <!-- enlace -->
    <br>
    <p>
        <a href="admin.php">Administrador</a>
    </p>
    
    
    <p class="bold">ANTONIO OSVALDO<br>MARCOS ORTEGA <br>FELIPE URRA</p>
    </div>
    </form>
    </div>
    </div>
   <!--fin card  -->
    </div>    
    </div>
    </div>

 <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  
  
         
</body>
</html>