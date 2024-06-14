<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/app/config/global.php");
require_once (ROOT_DIR . "/model/InscripcionesModel.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);
try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}
switch ($method) {
    case 'GET':
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {
            if ($p_ope == 'filterall') {
                filterAll($input);
            } else if ($p_ope == 'filterId') {
                filterId($input);
            } else if ($p_ope == 'filterSearch') {
                filterPaginateAll($input);
            }
        }
        break;
    case 'POST':
        insert($input);
        break;
    case 'PUT':
        update($input);
        break;
    case 'DELETE':
        delete($input);
        break;
    default:
        echo 'error404!';
        break;
}
function filterAll($input)
{
    $objIns = new InscripcionesModel();
    $var = $objIns->findall();
    echo json_encode($var);
}
function filterId($input)
{
    $p_id = !empty($input['codigo_pedido']) ? $input['codigo_pedido'] : $_GET['codigo_pedido'];
    $objIns = new InscripcionesModel();
    $var = $objIns->findid($p_id);
    echo json_encode($var);
}
function filterPaginateAll($input)
{
    $page = !empty($input['page']) ? $input['page'] : $_GET['page'];
    $filter = !empty($input['filter']) ? $input['filter'] : $_GET['filter'];
    $nro_record_page = 10;
    $p_limit = 10;
    $p_offset = 0;
    $p_offset = abs(($page - 1) * $nro_record_page);
    $objIns = new InscripcionesModel();
    $var = $objIns->findpaginateall($filter, $p_limit, $p_offset);
    echo json_encode($var);
}
function insert($input)
{
    $p_codigo_pedido = !empty($input['codigo_pedido']) ? $input['codigo_pedido'] : $_POST['codigo_pedido'];
    $p_nombre_cliente = !empty($input['nombre_cliente']) ? $input['nombre_cliente'] : $_POST['nombre_cliente'];
    $p_apellido_cliente = !empty($input['apellido_cliente']) ? $input['apellido_cliente'] : $_POST['apellido_cliente'];
    $p_direccion_entrega = !empty($input['direccion_entrega']) ? $input['direccion_entrega'] : $_POST['direccion_entrega'];
    $p_telefono = !empty($input['telefono']) ? $input['telefono'] : $_POST['telefono'];
    $p_email = !empty($input['email']) ? $input['email'] : $_POST['email'];
    $p_producto_pedido = !empty($input['producto_pedido']) ? $input['producto_pedido'] : $_POST['producto_pedido'];
    $p_fecha_pedido = !empty($input['fecha_pedido']) ? $input['fecha_pedido'] : $_POST['fecha_pedido'];
    $p_estado_pedido = !empty($input['estado_pedido']) ? $input['estado_pedido'] : $_POST['estado_pedido'];
    $p_cantidad = !empty($input['cantidad']) ? $input['cantidad'] : $_POST['cantidad'];
    $p_precio_total = !empty($input['precio_total']) ? $input['precio_total'] : $_POST['precio_total'];
    $p_observaciones = !empty($input['observaciones']) ? $input['observaciones'] : $_POST['observaciones'];
    $p_comentarios = !empty($input['comentarios']) ? $input['comentarios'] : $_POST['comentarios'];
    $p_tipo_pago = !empty($input['tipo_pago']) ? $input['tipo_pago'] : $_POST['tipo_pago'];
    $p_numero_pedidos = !empty($input['numero_pedidos']) ? $input['numero_pedidos'] : $_POST['numero_pedidos'];

    $objIns = new InscripcionesModel();
    $var = $objIns->insert($p_codigo_pedido, $p_nombre_cliente, $p_apellido_cliente, $p_direccion_entrega, $p_telefono, $p_email, $p_producto_pedido, $p_fecha_pedido, $p_estado_pedido, $p_cantidad, $p_precio_total, $p_observaciones, $p_comentarios, $p_tipo_pago, $p_numero_pedidos);
    echo json_encode($var);
}
function update($input)
{
    $p_codigo_pedido = !empty($input['codigo_pedido']) ? $input['codigo_pedido'] : $_POST['codigo_pedido'];
    $p_nombre_cliente = !empty($input['nombre_cliente']) ? $input['nombre_cliente'] : $_POST['nombre_cliente'];
    $p_apellido_cliente = !empty($input['apellido_cliente']) ? $input['apellido_cliente'] : $_POST['apellido_cliente'];
    $p_direccion_entrega = !empty($input['direccion_entrega']) ? $input['direccion_entrega'] : $_POST['direccion_entrega'];
    $p_telefono = !empty($input['telefono']) ? $input['telefono'] : $_POST['telefono'];
    $p_email = !empty($input['email']) ? $input['email'] : $_POST['email'];
    $p_producto_pedido = !empty($input['producto_pedido']) ? $input['producto_pedido'] : $_POST['producto_pedido'];
    $p_fecha_pedido = !empty($input['fecha_pedido']) ? $input['fecha_pedido'] : $_POST['fecha_pedido'];
    $p_estado_pedido = !empty($input['estado_pedido']) ? $input['estado_pedido'] : $_POST['estado_pedido'];
    $p_cantidad = !empty($input['cantidad']) ? $input['cantidad'] : $_POST['cantidad'];
    $p_precio_total = !empty($input['precio_total']) ? $input['precio_total'] : $_POST['precio_total'];
    $p_observaciones = !empty($input['observaciones']) ? $input['observaciones'] : $_POST['observaciones'];
    $p_comentarios = !empty($input['comentarios']) ? $input['comentarios'] : $_POST['comentarios'];
    $p_tipo_pago = !empty($input['tipo_pago']) ? $input['tipo_pago'] : $_POST['tipo_pago'];
    $p_numero_pedidos = !empty($input['numero_pedidos']) ? $input['numero_pedidos'] : $_POST['numero_pedidos'];

    $objIns = new InscripcionesModel();
    $var = $objIns->update($p_codigo_pedido, $p_nombre_cliente, $p_apellido_cliente, $p_direccion_entrega, $p_telefono, $p_email, $p_producto_pedido, $p_fecha_pedido, $p_estado_pedido, $p_cantidad, $p_precio_total, $p_observaciones, $p_comentarios, $p_tipo_pago, $p_numero_pedidos);
    echo json_encode($var);

}
function delete($input)
{
    $p_id = !empty($input['codigo_pedido']) ? $input['codigo_pedido'] : $_POST['codigo_pedido'];
    $objIns = new InscripcionesModel();
    $var = $objIns->delete($p_id);
    echo json_encode($var);
}
