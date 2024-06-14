<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'codigo_pedido' => $_POST['codigo_pedido'],
        'nombre_cliente' => $_POST['nombre_cliente'],
        'apellido_cliente' => $_POST['apellido_cliente'],
        'direccion_entrega' => $_POST['direccion_entrega'],
        'telefono' => $_POST['telefono'],
        'email' => $_POST['email'],
        'producto_pedido' => $_POST['producto_pedido'],
        'fecha_pedido' => $_POST['fecha_pedido'],
        'estado_pedido' => $_POST['estado_pedido'],
        'cantidad' => $_POST['cantidad'],
        'precio_total' => $_POST['precio_total'],
        'observaciones' => $_POST['observaciones'],
        'comentarios' => $_POST['comentarios'],
        'tipo_pago' => $_POST['tipo_pago'],
        'numero_pedidos' => $_POST['numero_pedidos'],
    ];
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json",
            'content' => json_encode($data),
        ]
    ]);
    $url = HTTP_BASE . '/controller/InscripcionesController.php';
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response, true);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        echo '<script>window.location.href ="' . HTTP_BASE . '/web/ins/list";</script>';
    } else {
        echo "<script>alert('Hubo un problema, al guardar el registro');</script>";
    }
}


?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modificar Inscrito</h1>
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
                                <h3 class="card-title">Editar Inscrito</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigo_pedido">Código Pedido</label>
                                        <input type="text" class="form-control" name="codigo_pedido" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_cliente">Nombre Cliente</label>
                                        <input type="text" class="form-control" name="nombre_cliente" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido_cliente">Apellido Cliente</label>
                                        <input type="text" class="form-control" name="apellido_cliente" required
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion_entrega">Dirección de Entrega</label>
                                        <input type="text" class="form-control" name="direccion_entrega" required
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="producto_pedido">Producto Pedido</label>
                                        <input type="text" class="form-control" name="producto_pedido" required
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_pedido">Fecha Pedido</label>
                                        <input type="text" class="form-control" name="fecha_pedido" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_pedido">Estado Pedido</label>
                                        <input type="text" class="form-control" name="estado_pedido" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" class="form-control" name="cantidad" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio_total">Precio Total</label>
                                        <input type="text" class="form-control" name="precio_total" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones</label>
                                        <input type="text" class="form-control" name="observaciones" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="comentarios">Comentarios</label>
                                        <input type="text" class="form-control" name="comentarios" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_pago">Tipo de Pago</label>
                                        <input type="text" class="form-control" name="tipo_pago" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_pedidos">Número de Pedidos</label>
                                        <input type="text" class="form-control" name="numero_pedidos" required value="">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
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