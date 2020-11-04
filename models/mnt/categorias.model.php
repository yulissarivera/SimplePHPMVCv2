<?php
require_once "libs/dao.php"
function getAllCategorias(){
    $sqlstr="SELECT * from categorias;";
    $resultSet=array();
    $resultSet=obtenerRegistros($sqlstr);
    return $resultSet;
}
function getAllCategoriaById($catecod){
    $sqlstr="SELECT * from categorias WHERE catenom=%s;";
    return obtenerRegistros(sprintf($sqlstr,$catecod));
}
function addNewCategoria($catenom,$cateest){
$insSql="INSERT INTO `categorias`(`catenom`,`cateest`) VALUES ('%s','%s');";
    return ejecutarNonQuery(
        sprintf(
            $insSql,
            $catenom,
            $cateest
        )
    )
}
function addNewCategoria($catenom,$cateest,$catecod){
    $insSql="UPDATE INTO `categorias`(`catenom`,`cateest`) VALUES ('%s','%s') WHERE `catecod`=('%s');";
        return ejecutarNonQuery(
            sprintf(
                $insSql,
                $catenom,
                $cateest,
                $catecod
            )
        )
    }
?> 