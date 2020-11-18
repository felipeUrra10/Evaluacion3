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
    <title>Optica</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">

            </div>
            <div class="col l4 m4 s12">
                <div class="card">
                    <div class="card-content">
                        <i class="material-icons large ">account_box</i>
                        <h5>Acceso Admin</h5>
                    </div>
                    <div class="card-action">
                        <form action="controllers/LoginControllerAdmin.php" method="POST">
                            <p class="red-text">
                                <?php
                                session_start();
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </p>
                            <div class="input-field">
                                <input id="rut" type="text" name="rut">
                                <label for="rut">Rut del usuario</label>
                            </div>
                            <div class="input-field">
                                <input id="clave" type="password" name="clave">
                                <label for="clave">Clave de acceso</label>
                            </div>
                            <!--<input type="hidden" name="estado" value="1" />-->
                            <button class="btn black ancho-100 bordes">Entrar</button>
                            <p>
                                <a href="index.php">Volver</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>