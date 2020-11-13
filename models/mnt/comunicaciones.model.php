<?php 
require_once "libs/dao.php";
/*
cmnid bigint UN AI PK 
clientid bigint 
cmnnotas varchar(5000) 
cmntags varchar(255) 
cmnfching datetime 
cmnusring bigint 
cmntipo
*/
function getAllComunicaciones(){
    $sqlstr = "SELECT * from comunicaciones;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function getCountComunicaciones()
{
  $sqlstr = "SELECT count(*) as Comunicaciones from comunicaciones;";
  $resultSet = array();
  $resultSet = obtenerUnRegistro($sqlstr);
  return $resultSet;
}

function getComunicacionesById($cmnid) {
    $sqlstr = "SELECT * from comunicaciones where cmnid = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $cmnid));
}

function getComunicacionesPorCodigo($filtro) {
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * from comunicaciones where cmnid like '%d';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro));
}

function addNewComunicacion($clientid, $cmnnotas, $cmntags, $cmntipo){
    $insSql = "INSERT INTO `comunicaciones` ( `clientid`, `cmnnotas`, `cmntags`, `cmnfching`, `cmnusring`, `cmntipo`) VALUES ( '%s', '%s', '%s', now(), '1', '%s');";
    return ejecutarNonQuery(
        sprintf(
            $insSql,
            $clientid,
            $cmnnotas,
            $cmntags,
            $cmntipo
        )
    );
}

?>
