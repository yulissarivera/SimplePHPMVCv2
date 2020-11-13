<?php 
require_once "libs/dao.php";
/*
clientid bigint(15) AI PK cmnid
clientname varchar(128)  clienteid
clientgender char(3)   cmnnotas
clientphone1 varchar(255) cmntags
clientphone2 varchar(255) cmnfching
clientemail varchar(255) cmnusring
clientIdnumber varchar(45) cmntipo
clientbio varchar(5000)
clientstatus char(3)
catecod bigint(10)
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

function getComunicacionesPorFiltro($filtro) {
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * from comunicaciones where cmntipo like '%s' or clientid like '%d';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewComunicacion($clientid, $cmnnotas, $cmntags, $cmnfching, $cmnusring, $cmntipo){
    $insSql = "INSERT INTO `comunicaciones` (`clientid`, `cmnnotas`, `cmntags`, `cmnfching`,
`cmnusring`, `cmntipo`)
VALUES ( '%d', '%s', '%s', '%s', '%s', '%s', now(), 0, %d);";

    return ejecutarNonQuery(
        sprintf(
            $insSql,
            $clientid,
            $cmnnotas,
            $cmntags,
            $cmnfching,
            $cmnusring,
            $cmntipo
        )
    );
}


?>
