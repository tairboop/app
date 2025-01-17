<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ope = 'register';
    $p_correo_electronico = $_POST['email'];
    $p_nombre = $_POST['nombre'];
    $p_contrasena = $_POST['psw'];
    $p_contrasena1 = $_POST['psw1'];
    //Validar
    try {
        $data = [
            'ope' => $ope,
            'correo_electronico' => $p_correo_electronico,
            'nombre' => $p_nombre,
            'contrasena' => $p_contrasena,
        ];
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data),
            ]
        ]);
        $url = HTTP_BASE . "/controller/LoginController.php";
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response, true);
        if ($result["ESTADO"]) {
            echo "<script>alert('Se realizo la operacion de manera Exitosa');</script>";
        } else {
            echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas 2');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas 1');</script>";
    }
}



?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="<?php echo URL_RESOURCES; ?>adminlte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet"
        href="<?php echo URL_RESOURCES; ?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo URL_RESOURCES; ?>adminlte/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="register-page" style="min-height: 570.8px;">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>Sistemas</b></a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrar</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo Electronico" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="psw">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Repite Contraseña" name="psw1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>

                    </div>
                </form>

                <a href="<?php echo HTTP_BASE . '/login'; ?>" class="text-center">Ya Tengo cuenta, Iniciar Session</a>
            </div>

        </div>
    </div>


    <script src="<?php echo URL_RESOURCES; ?>adminlte/plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo URL_RESOURCES; ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo URL_RESOURCES; ?>adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>


</body>

</html>