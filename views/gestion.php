<?php

use models\UsuarioModel as UsuarioModel;

session_start();
require_once("../models/UsuarioModel.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['usuario'])) {
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
    <link rel="stylesheet" href=" ../css/style.css">
    <title>Gestión De Usuarios</title>
</head>
<body>
    <?php if (isset($_SESSION['usuario'])) { ?>
        <a href="#" data-target="menu-responsive" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>
        
        <a href="#" class="brand-logo">Bienvenido <?= $_SESSION['usuario']['nombre'] ?></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="gestion.php">Gestión de Usuarios</a></li>
            <li><a href="salir.php">Salir</a></li>
        </ul>                  
    </nav>
    <ul class="sidenav" id="menu-responsive">
        <li class="active"><a href="gestion.php">Gestión de Usuarios</a></li>
        <li><a href="salir.php">Salir</a></li>
        
    </ul>
    
    <div class="container">
        <div class="row">
            <nav class="nav-wrapper"> 
    <div class="col l4 m4 s12"> 
        <?php if (isset($_SESSION['editar'])) { ?>           
            <div class="card">
                <div class="card-content"> 
                    <i class="material-icons md-black medium ">account_box</i>
                    <h4 class="center orange-text accent-2">Editar El Usuario</h4>
                    <form action="../controllers/ControlEditar.php" method="POST">
                        <div class="input-field">
                            <input id="rut" type="text" name="rut" value="<?= $_SESSION['usuario']['rut'] ?>">
                            <label for="rut">Rut Del Usuario</label>
                        </div>
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre'] ?>">
                            <label for="nombre">Nombre Del Usuario</label>
                        </div>
                        <div class="input-field col s12">    
                            <select name="estado" id="estado">
                                <option value="1">Habilitado</option>
                                <option value="0">Bloqueado</option>
                            </select>  
                            <label>Estado Usuario</label>
                        </div>
                        <button class="btn black ancho-100 redondo">Editar Usuario</button>
                    </form>   
                </div>
            </div>
        <?php
            unset($_SESSION['editar']);
            unset($_SESSION['usuario']);
        } else if (isset($_SESSION['usuario'])) {
        ?>
            <div class="card">
                <div class="card-content">
                    <i class="material-icons md-black medium ">account_box</i>
                    <h4 class="center black-text accent-2">Nuevo Usuario</h4>
                </div>
                <div class="card-action">
                    <form action="../controllers/ControlInsert.php" method="POST">
                        <div class="input-field">
                            <input id="rut" type="text" name="rut">
                            <label for="rut">Rut del Usuario</label>
                        </div>
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre">
                            <label for="nombre">Nombre Del Usuario</label>
                        </div>
                            <input type="hidden" name="rol" value="vendedor">
                            <input type="hidden" name="clave" value="123">
                            <input type="hidden" name="estado" value="1">
                            <button class="btn black ancho-100 bordes">Crear Usuario</button>
                    </form> 
                    <p class="black-text">
                        <?php
                            if (isset($_SESSION['respuesta'])) {
                                echo $_SESSION['respuesta'];
                                unset($_SESSION['respuesta']);
                            } else
                        ?>
                    </p> 
                    <p class="red-text">
                        <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="col l8 m8 s12">
        <div class="card">
            <div class="card-content">
                <h4 class="center black-text accent-2">Lista De Usuarios</h4>
                <form action="../controllers/ControlTable.php" method="POST">
                    <table class="black-text accent-2">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        <?php foreach ($usuario as $item) { ?>
                                <tr>
                                    <td> <?= $item["rut"] ?> </td>
                                    <td> <?= $item['nombre'] ?> </td>
                                    <?php if ($item['estado'] == 1) { ?>
                                            <td class="blue-text"> <?= $item['estado'] = "Habilitado"; ?> </td>
                                    <?php } else { ?>
                                            <td class="red-text"> <?= $item['estado'] = "Bloqueado"; ?> </td>
                                    <?php } ?>
                                    <td>
                                        <button name="bt_edit" value="<?= $item["rut"] ?>" class="btn-floating">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
     
    <?php } else { ?>
        <h3 class="red-text">Error De Acceso</h3>
        <p>
            Acceso Denegado!
            <br><br>
            <a href="../index.php">inicio</a>
        </p>  
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose': true,
                'format':'dd/mm/yyy'
            });
            
        });
    </script>

</body>
</html>