<?php
include_once "../core/ModeloBasePDO.php";
class UsuarioModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findall()
    {
        $sql = "SELECT  email ,  fullname ,  password_hash, registration_date   FROM login_sis; ";
        $param = array();
        return parent::gselect($sql, $param);
    }
    public function findid($p_correo_electronico)
    {
        $sql = "SELECT   email ,  fullname ,  password_hash, registration_date   FROM login_sis
         WHERE email = :p_correo_electronico;  ";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }
    public function findpaginateall($p_filtro, $p_limit, $p_offset)
    {
        $sql = "SELECT  email ,  fullname ,  password_hash, registration_date
        FROM login_sis
        WHERE upper(concat(IFNULL(email,''),IFNULL(fullname,''),IFNULL(password_hash,''),IFNULL(registration_date,''))) like concat('%',upper(IFNULL(:p_filtro,'')),'%') 
        limit :p_limit
        OFFSET :p_offset  ";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
        $var = parent::gselect($sql, $param);

        $sqlCount = "SELECT concat(1) as cant
        FROM login_sis
        WHERE upper(concat(IFNULL(email,''),IFNULL(fullname,''),IFNULL(password_hash,''),IFNULL(registration_date,''))) like concat('%',upper(IFNULL(:p_filtro,'')),'%')";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $param);
        $var['LENGTH'] = $var1['DATA'][0]['cant'];
        return $var;
    }
    public function verificarlogin($p_email, $p_password)
    {
        $sql = "SELECT email, fullname
            FROM login_sis
            WHERE
            email = :p_email AND 
            password_hash = :p_password_hash";
        $param = array();
        array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($param, [':p_password_hash', $p_password, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }

    public function register($p_correo_electronico, $p_nombre, $p_contrasena)
    {
        $sql = "INSERT INTO `login_sis`(`email`, `fullname`, `password_hash`, `registration_date`)
        VALUES ( :p_email ,  :p_nombre ,  :p_contrasena ,:now());";
        $param = array();
        array_push($param, [':p_email', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);

        return parent::ginsert($sql, $param);
    }
    public function update($p_correo_electronico, $p_nombre, $p_contrasena)
    {
        $sql = " UPDATE  login_sis  SET 
         fullname =  :p_nombre, 
         password_hash = :p_contrasena        
        WHERE  email = :p_correo_electronico ";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);
        return parent::gupdate($sql, $param);
    }
    public function delete($p_correo_electronico)
    {
        $sql = "DELETE FROM  login_sis  WHERE  email = :p_correo_electronico";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        return parent::gdelete($sql, $param);
    }
}
