<?php

require_once "libs/dao.php";
/*
clientid bigint AI PK 
clientname varchar(128) 
clientgender char(3) 
clientphone1 varchar(255) 
clientphone2 varchar(255) 
clientmail varchar(255) 
clientnumber varchar(45) 
clientbio varchar(5000) 
clientstatus char(3) 
clientdatecrt datetime 
clientusercreate bigint
*/

function getAllClientes(){

    $sqlstr = "SELECT * FROM clients;";
    $resulSet = array();
    $resulSet = obtenerRegistros($sqlstr);
    return $resulSet;
}

function getClientById($clientid){
    $sqlstr = "SELECT * from clients where clientid = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $clientid));
}


function getClientesPorFiltro($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM clients where clientnumber LIKE '%s' Or clientname LIKE '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewClient($clientname, $clientgender, $clientphone1, $clientphone2, $clientmail, $clientnumber, $clientbio,$clientstatus){
    $insSql = "INSERT INTO `clients` (`clientname`,`clientgender`,`clientphone1`,`clientphone2`,`clientmail`,`clientnumber`,`clientbio`,`clientstatus`,`clientdatecrt`,`clientusercreate`)
    VALUES ('%s','%s','%s','%s','%s','%s','%s','%s',now(),0);";
    
    return ejecutarNonQuery(
        //este es una funcion de php que da formato a una cadena formateada
        sprintf(
            $insSql,
            $clientname, 
            $clientgender, 
            $clientphone1, 
            $clientphone2, 
            $clientmail, 
            $clientnumber, 
            $clientbio,
            $clientstatus
        )
    );
}

function updateCliente($clientname, $clientgender, $clientphone1, $clientphone2, $clientmail, $clientnumber, $clientbio,$clientstatus, $clientid){
    $updsql = "UPDATE `clients`SET`clientname`= '%s',`clientgender`= '%s',`clientphone1`= '%s',`clientphone2`= '%s',`clientmail`= '%s',
    `clientnumber`= '%s',`clientbio`= '%s',`clientstatus`= '%s' WHERE `clientid` = '%d';";

    return ejecutarNonQuery(
        //este es una funcion de php que da formato a una cadena formateada
        sprintf(
            $updsql,
            $clientname, 
            $clientgender, 
            $clientphone1, 
            $clientphone2, 
            $clientmail, 
            $clientnumber, 
            $clientbio,
            $clientstatus,
            $clientid
        )
    );
}

function deleteCliente($clientid){
    return ejecutarnonQuery(sprintf("DELETE from clients where clientid = %d;", $clientid));
}

?>