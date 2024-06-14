<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php
$pId = $_GET['codigo_pedido'] ?? null;

$record = null;

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
                        <h1>Ver Detalle de Papaleria</h1>
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
                                <h3 class="card-title">Editar Papaleria</h3>
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
                                        <select class="form-control" id="estado_pedido" name="estado_pedido" disabled>
                                            <option value="Pendiente" <?php echo (isset($record['estado_pedido']) && $record['estado_pedido'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente
                                            </option>
                                            <option value="En Proceso" <?php echo (isset($record['estado_pedido']) && $record['estado_pedido'] == 'En Proceso') ? 'selected' : ''; ?>>En Proceso
                                            </option>
                                            <option value="Entregado" <?php echo (isset($record['estado_pedido']) && $record['estado_pedido'] == 'Entregado') ? 'selected' : ''; ?>>Entregado
                                            </option>
                                        </select>
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
                                        <textarea class="form-control" name="observaciones"
                                            disabled><?php echo $record['observaciones']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comentarios">Comentarios</label>
                                        <textarea class="form-control" name="comentarios"
                                            disabled><?php echo $record['comentarios']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_pago">Tipo de Pago</label>
                                        <select class="form-control" id="tipo_pago" name="tipo_pago" disabled>
                                            <option value="Efectivo" <?php echo (isset($record['tipo_pago']) && $record['tipo_pago'] == 'Efectivo') ? 'selected' : ''; ?>>Efectivo
                                            </option>
                                            <option value="Tarjeta de Crédito" <?php echo (isset($record['tipo_pago']) && $record['tipo_pago'] == 'Tarjeta de Crédito') ? 'selected' : ''; ?>>
                                                Tarjeta de Crédito</option>
                                            <option value="Transferencia Bancaria" <?php echo (isset($record['tipo_pago']) && $record['tipo_pago'] == 'Transferencia Bancaria') ? 'selected' : ''; ?>>Transferencia Bancaria</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_pedidos">Número de Pedidos</label>
                                        <input type="text" class="form-control" name="numero_pedidos" required
                                            value="<?php echo $record['numero_pedidos']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="card-footer">
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