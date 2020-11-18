<?php

use models\UsuarioModel as UsuarioModel;

session_start();
require_once("../models/UsuarioModel.php");
require_once("../models/ClienteModel.php");

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
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['usuario'])) { ?>
        <nav class="">
            <div class="nav-wrapper">
            <a href="clientes.php" class="brand-logo">
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <img src="" alt="">
                Bienvenido: <?= $_SESSION['usuario']['nombre'] ?></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li class="active"><a href="clientes.php">Crear Cliente</a></li>
                        <li><a href="#">Buscar receta</a></li>
                        <li><a href="#">Ingreso</a></li>
                        <li><a href="salir.php">salir</a></li>
                    </ul>
            </div>

                </nav>
                <ul class="sidenav" id="menu-responsive">
                    <li>
                        <div class="user-view">
                            <div class="background">
                                <img src="http://img.freepik.com/iconos-gratis/lentes_318-68634.jpg?size=338&ext=jpgs" alt="">
                            </div>
                            <a href="#"><img class="http://img.freepik.com/iconos-gratis/lentes_318-68634.jpg?size=338&ext=jpg"></a>

                        </div>
                    </li>
                    <li class="active"><a href="clientes.php">Crear Cliente</a></li>
                    <li><a href="#">receta</a></li>
                    <li><a href="#">Ingreso</a></li>
                    <li><a href="salir.php"></a></li>
                    
                </ul>
                        <div class="container">
                            <div class="row">
                <div class="col l8 m4 s12"></div>
                <div class="col l8 m4 s12">
                    <div class="card">
                        <div class="card-action">
                            <h6>Nuevo Cliente</h6>
                            <!-- INICION FORMULARIO -->
                            <form action="../controllers/ClienteController.php" method="POST">
                                <p class="green-text">
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
                                <!-- RUT -->
                                <div class="input-field col l4">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input id="rut" type="text" name="rut">
                                    <label for="rut">Rut</label>
                                </div>
                                <!-- NOMBRE -->
                                <div class="input-field col l4">
                                    <i class="material-icons prefix">account_box</i>
                                    <input id="name" type="text" name="name">
                                    <label for="name">Nombre</label>
                                </div>
                                <!-- DIRECCION -->
                                <div class="input-field col l4">
                                    <i class="material-icons prefix">place</i>
                                    <input id="direccion" type="text" name="direccion">
                                    <label for="direccion">Direccion</label>
                                </div>
                                <!-- TELEFONO -->
                                <div class="input-field col l4">
                                    <i class="material-icons prefix">local_phone</i>
                                    <input id="fono" type="text" name="fono">
                                    <label for="fono">Telefono</label>
                                </div>
                                <!-- FECHA -->
                                <div class="input-field col l4">
                                    <i class="material-icons prefix">insert_invitation</i>
                                    <input id="fecha" type="text" class="validate datepicker" name="fecha">
                                    <label for="fecha">Fecha</label>
                                </div>
                                <!-- EMAIL -->
                                <div class="input-field col l4">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="text" name="email">
                                    <label for="email">email</label>
                                </div>
                                <!-- BOTON CRAEAR -->
                                <button class="btn black ancho-100">Crear Cliente</button>
                                <!--FINAL FOrMULARIO  -->
                            </form>
                            <p class="red-text">
                                <?php
                                if (isset($_SESSION['respuesta'])) {
                                    echo $_SESSION['respuesta'];
                                    unset($_SESSION['respuesta']);
                                }
                                ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>

        <h3 class="red-text">Error de acceso</h3>
        <p>Acceso Denegado!
            <br><br>
            <a href="../index.php">Inicio</a>
        </p>
    <?php } ?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose': true,
                'format': 'dd/mm/yyyy',
                'i18n': {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"],
                    cancel: 'Cancelar',
                    clear: 'Limpiar',
                    done: 'Aceptar'
                }
            });
        });
    </script>
</body>

</html>