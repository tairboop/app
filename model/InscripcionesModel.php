<?php
include_once "../core/ModeloBasePDO.php";
class InscripcionesModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findall()
    {
        $sql = "SELECT `codigo_pedido`, `nombre_cliente`, `apellido_cliente`, `direccion_entrega`, `telefono`, `email`, `producto_pedido`, `fecha_pedido`, `estado_pedido`, `cantidad`, `precio_total`, `observaciones`, `comentarios`, `tipo_pago`, `numero_pedidos` 
        FROM `pedidos_papeleria`; ";
        $param = array();
        return parent::gselect($sql, $param);
    }
    public function findid($p_id)
    {
        $sql = "SELECT codigo_pedido, nombre_cliente, apellido_cliente, direccion_entrega, telefono, email, producto_pedido, fecha_pedido, estado_pedido, cantidad, precio_total, observaciones, comentarios, tipo_pago, numero_pedidos 
        FROM pedidos_papeleria
         WHERE codigo_pedido = :p_id;";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }
    public function findpaginateall($p_filtro, $p_limit, $p_offset)
    {
        $sql = "SELECT `codigo_pedido`, `nombre_cliente`, `apellido_cliente`, `direccion_entrega`, `telefono`, `email`, `producto_pedido`, `fecha_pedido`, `estado_pedido`, `cantidad`, `precio_total`, `observaciones`, `comentarios`, `tipo_pago`, `numero_pedidos` 
        FROM `pedidos_papeleria`
        WHERE upper(concat(IFNULL(codigo_pedido,''),IFNULL(nombre_cliente,''),IFNULL(apellido_cliente,''),IFNULL(direccion_entrega,''),IFNULL(telefono,''),IFNULL(email,''),IFNULL(producto_pedido,''),IFNULL(fecha_pedido,''),IFNULL(estado_pedido,''),IFNULL(cantidad,''),IFNULL(precio_total,''),IFNULL(observaciones,''),IFNULL(comentarios,''),IFNULL(tipo_pago,''),IFNULL(numero_pedidos,''))) like concat('%',upper(IFNULL(:p_filtro,'')),'%') 
        limit :p_limit
        OFFSET :p_offset";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
        $var = parent::gselect($sql, $param);

        $sqlCount = "SELECT count(1)  as cant
        FROM `pedidos_papeleria` 
        WHERE 
        upper(concat(IFNULL(codigo_pedido,''),IFNULL(nombre_cliente,''),IFNULL(apellido_cliente,''),IFNULL(direccion_entrega,''),IFNULL(telefono,''),IFNULL(email,''),IFNULL(producto_pedido,''),IFNULL(fecha_pedido,''),IFNULL(estado_pedido,''),IFNULL(cantidad,''),IFNULL(precio_total,''),IFNULL(observaciones,''),IFNULL(comentarios,''),IFNULL(tipo_pago,''),IFNULL(numero_pedidos,''))) like  concat('%',upper(IFNULL(:p_filtro,'')),'%')";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $param);
        $var['LENGTH'] = $var1['DATA'][0]['cant'];
        return $var;
    }
    public function insert($p_codigo_pedido, $p_nombre_cliente, $p_apellido_cliente, $p_direccion_entrega, $p_telefono, $p_email, $p_producto_pedido, $p_fecha_pedido, $p_estado_pedido, $p_cantidad, $p_precio_total, $p_observaciones, $p_comentarios, $p_tipo_pago, $p_numero_pedidos)
    {
        $sql = "INSERT INTO `pedidos_papeleria`( codigo_pedido, `nombre_cliente`, `apellido_cliente`, `direccion_entrega`, `telefono`, `email`, `producto_pedido`, `fecha_pedido`, `estado_pedido`, `cantidad`, `precio_total`, `observaciones`, `comentarios`, `tipo_pago`, numero_pedidos) 
        VALUES (:p_codigo_pedido, :p_nombre_cliente, :p_apellido_cliente, :p_direccion_entrega, :p_telefono, :p_email, :p_producto_pedido, :p_fecha_pedido, :p_estado_pedido, :p_cantidad, :p_precio_total, :p_observaciones, :p_comentarios, :p_tipo_pago, :p_numero_pedidos);";
        $param = array();
        array_push($param, [':p_codigo_pedido', $p_codigo_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_nombre_cliente', $p_nombre_cliente, PDO::PARAM_STR]);
        array_push($param, [':p_apellido_cliente', $p_apellido_cliente, PDO::PARAM_STR]);
        array_push($param, [':p_direccion_entrega', $p_direccion_entrega, PDO::PARAM_STR]);
        array_push($param, [':p_telefono', $p_telefono, PDO::PARAM_STR]);
        array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($param, [':p_producto_pedido', $p_producto_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_fecha_pedido', $p_fecha_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_estado_pedido', $p_estado_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_cantidad', $p_cantidad, PDO::PARAM_INT]);
        array_push($param, [':p_precio_total', $p_precio_total, PDO::PARAM_INT]);
        array_push($param, [':p_observaciones', $p_observaciones, PDO::PARAM_STR]);
        array_push($param, [':p_comentarios', $p_comentarios, PDO::PARAM_STR]);
        array_push($param, [':p_tipo_pago', $p_tipo_pago, PDO::PARAM_STR]);
        array_push($param, [':p_numero_pedidos', $p_numero_pedidos, PDO::PARAM_INT]);
        return parent::ginsert($sql, $param);
    }
    public function update($p_codigo_pedido, $p_nombre_cliente, $p_apellido_cliente, $p_direccion_entrega, $p_telefono, $p_email, $p_producto_pedido, $p_fecha_pedido, $p_estado_pedido, $p_cantidad, $p_precio_total, $p_observaciones, $p_comentarios, $p_tipo_pago, $p_numero_pedidos)
    {
        $sql = "UPDATE `pedidos_papeleria` SET 
        `nombre_cliente` = :p_nombre_cliente, 
        `apellido_cliente` = :p_apellido_cliente,
        `direccion_entrega` = :p_direccion_entrega, 
        `telefono` = :p_telefono, 
        `email` = :p_email, 
        `producto_pedido` = :p_producto_pedido, 
        `fecha_pedido` = :p_fecha_pedido, 
        `estado_pedido` = :p_estado_pedido, 
        `cantidad` = :p_cantidad, 
        `precio_total` = :p_precio_total, 
        `observaciones` = :p_observaciones, 
        `comentarios` = :p_comentarios, 
        `tipo_pago` = :p_tipo_pago, 
        `numero_pedidos` = :p_numero_pedidos 
        WHERE `codigo_pedido` = :p_codigo_pedido";
        $param = array();
        array_push($param, [':p_codigo_pedido', $p_codigo_pedido, PDO::PARAM_STR]);//(campo, valor, tipo de dato
        array_push($param, [':p_nombre_cliente', $p_nombre_cliente, PDO::PARAM_STR]);
        array_push($param, [':p_apellido_cliente', $p_apellido_cliente, PDO::PARAM_STR]);
        array_push($param, [':p_direccion_entrega', $p_direccion_entrega, PDO::PARAM_STR]);
        array_push($param, [':p_telefono', $p_telefono, PDO::PARAM_STR]);
        array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($param, [':p_producto_pedido', $p_producto_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_fecha_pedido', $p_fecha_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_estado_pedido', $p_estado_pedido, PDO::PARAM_STR]);
        array_push($param, [':p_cantidad', $p_cantidad, PDO::PARAM_INT]);
        array_push($param, [':p_precio_total', $p_precio_total, PDO::PARAM_INT]);
        array_push($param, [':p_observaciones', $p_observaciones, PDO::PARAM_STR]);
        array_push($param, [':p_comentarios', $p_comentarios, PDO::PARAM_STR]);
        array_push($param, [':p_tipo_pago', $p_tipo_pago, PDO::PARAM_STR]);
        array_push($param, [':p_numero_pedidos', $p_numero_pedidos, PDO::PARAM_INT]);
        return parent::gupdate($sql, $param);
    }
    public function delete($p_id)
    {
        $sql = "DELETE FROM `pedidos_papeleria` WHERE codigo_pedido =:p_id";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_STR]);
        return parent::gdelete($sql, $param);
    }
}
