<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ope = 'login';
    $p_correo_electronico = $_POST['email'];
    $p_contrasena = $_POST['psw'];
    //Validar
    try {
        $data = [
            'ope' => $ope,
            'email' => $p_correo_electronico,
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
        if ($result["ESTADO"] && isset($result['DATA']) && !empty($result['DATA'])) {
            $_SESSION['login'] = $result['DATA'][0];
            if (isset($_SESSION['login']['fullname'])) {
                echo "<script>alert('Acceso Autorizado');</script>";

                echo '<script>window.location.href ="' . HTTP_BASE . '/web/ins/list";</script>';
            } else {
                echo "<script>alert('Acceso No Autorizado');</script>";
            }

        } else {
            echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas');</script>";
    }
}



?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="<?php echo URL_RESOURCES; ?>adminlte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet"
        href="<?php echo URL_RESOURCES; ?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo URL_RESOURCES; ?>adminlte/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="login-page" style="min-height: 466px;">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1"><b>LOGIN</b< /a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar Session</p>
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
                        <input type="password" class="form-control" placeholder="Contraseña" name="psw">
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
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sessión</button>
                        </div>

                    </div>
                </form>



                <p class="mb-0">
                    <a href="<?php echo HTTP_BASE . '/register'; ?>" class="text-center">Registrarse</a>
                </p>
            </div>

        </div>

    </div>


    <script src="<?php echo URL_RESOURCES; ?>adminlte/plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo URL_RESOURCES; ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo URL_RESOURCES; ?>adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>


</body>

</html>