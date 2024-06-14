<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php
$pId = $_GET['codigo_pedido'] ?? null;

$record = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'codigo_pedido' => $_POST['codigo_pedido']
    ];
    $context = stream_context_create([
        'http' => [
            'method' => 'DELETE',
            'header' => "Content-Type: application/json",
            'content' => json_encode($data),
        ]
    ]);
    $url = HTTP_BASE . '/controller/InscripcionesController.php';
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response, true);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        echo '<script>window.location.href="' . HTTP_BASE . '/web/ins/list' . '";</script>';
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}
if ($pId) {
    $url = HTTP_BASE . '/controller/InscripcionesController.php?ope=filterId&codigo_pedido=' . $pId;
    $reponse = file_get_contents($url);
    $reponseData = json_decode($reponse, true);
    if ($reponseData && $reponseData['ESTADO'] == 1 && !empty($reponseData['DATA'])) {
        $record = $reponseData['DATA'][0];
    } else {
        $record = null;
    }
}

?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Eliminar Papel</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Editar</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigo_pedido">Código de Pedido</label>
                                        <input type="hidden" class="form-control" name="codigo_pedido"
                                            value="<?php echo $record['codigo_pedido']; ?>">
                                        <input type="text" class="form-control"
                                            value="<?php echo $record['codigo_pedido']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_cliente">Nombre del Cliente</label>
                                        <input type="text" class="form-control" name="nombre_cliente" required
                                            value="<?php echo $record['nombre_cliente']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido_cliente">Apellido del Cliente</label>
                                        <input type="text" class="form-control" name="apellido_cliente" required
                                            value="<?php echo $record['apellido_cliente']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion_entrega">Dirección de Entrega</label>
                                        <input type="text" class="form-control" name="direccion_entrega" required
                                            value="<?php echo $record['direccion_entrega']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" required
                                            value="<?php echo $record['telefono']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" required
                                            value="<?php echo $record['email']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="producto_pedido">Producto Pedido</label>
                                        <input type="text" class="form-control" name="producto_pedido" required
                                            value="<?php echo $record['producto_pedido']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_pedido">Fecha de Pedido</label>
                                        <input type="text" class="form-control" name="fecha_pedido" required
                                            value="<?php echo $record['fecha_pedido']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_pedido">Estado de Pedido</label>
                                        <input type="text" class="form-control" name="estado_pedido" required
                                            value="<?php echo $record['estado_pedido']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" class="form-control" name="cantidad" required
                                            value="<?php echo $record['cantidad']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="precio_total">Precio Total</label>
                                        <input type="text" class="form-control" name="precio_total" required
                                            value="<?php echo $record['precio_total']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones</label>
                                        <input type="text" class="form-control" name="observaciones" required
                                            value="<?php echo $record['observaciones']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="comentarios">Comentarios</label>
                                        <input type="text" class="form-control" name="comentarios" required
                                            value="<?php echo $record['comentarios']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_pago">Tipo de Pago</label>
                                        <input type="text" class="form-control" name="tipo_pago" required
                                            value="<?php echo $record['tipo_pago']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_pedidos">Número de Pedidos</label>
                                        <input type="text" class="form-control" name="numero_pedidos" required
                                            value="<?php echo $record['numero_pedidos']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a class="btn btn-default" href="<?php echo HTTP_BASE; ?>/web/ins/list">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include ROOT_VIEW . "/template/footer.php"; ?>