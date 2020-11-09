<?php

require_once "libs/dao.php";

function getAllCategorias(){

    $sqlstr = "SELECT * FROM categorias;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function getCategoriaPorFiltro($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM categorias where catecode LIKE %d or catename LIKE '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewCategoria($catename, $catestatus){
    $inssql = "INSERT INTO `categorias` (`catename`,`catestatus`,`catedate`) VALUES ('%s','%s',now());";

    return ejecutarNonQuery(sprintf($inssql, $catename, $catestatus));
}

function getCategoriaById($catecode){
    $sqlstr = "SELECT * FROM categorias WHERE catecode = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $catecode));
}

function updateCategoria($catename, $catestatus, $catecode){
    $updsql = "UPDATE `categorias` SET `catename` = '%s', `catestatus` = '%s' WHERE `catecode` = %d;";
    return ejecutarNonQuery(sprintf($updsql, $catename, $catestatus, $catecode));
}

function deleteCategoria($catecode){
    $delsql = "DELETE FROM `categorias` WHERE catecode = %d;";
    return ejecutarNonQuery(sprintf($delsql, $catecode));
}

?>