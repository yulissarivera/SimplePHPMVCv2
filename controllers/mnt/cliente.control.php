<?php

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

require_once "models/mnt/clientes.model.php";

function run(){
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["clientid"] = 0;
    $viewData["clientname"] = "";
    $viewData["clientgender"] = "FEM";
    $viewData["clientphone1"] = "";
    $viewData["clientphone2"] = "";
    $viewData["clientmail"] = "";
    $viewData["clientnumber"] = "";
    $viewData["clientbio"] = "";
    $viewData["clientstatus"] = "ACT";
    $viewData["clientgender_FEM"] = "selected";
    $viewData["clientgender_MAS"] = "";
    $viewData["clientstatus_ACT"] = "selected";
    $viewData["clientstatus_INA"] = "";

    $viewData["readonly"] = "";
    $viewData["deletemsg"] = "";
    $viewData["xsstoken"] = "";

    $modedsc = array(
        "INS"=>"Nuevo Cliente",
        "UPD"=>"Actualizar Cliente %s",
        "DEL"=>"Eliminar Cliente %s",
        "DSP"=>"Detalle del Cliente %s"
    );

    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["clientid"] = intval($_GET["clientid"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=clientes");
            die();
        }
    }

    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST, $viewData);
        //Verificacion de XSS Token
        if(!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] = $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=clientes");
            die();
        }
        switch ($viewData["mode"]){
            case "INS":
                $result = addNewClient($viewData["clientname"],
                $viewData["clientgender"],
                $viewData["clientphone1"],
                $viewData["clientphone2"],
                $viewData["clientmail"],
                $viewData["clientnumber"],
                $viewData["clientbio"],
                $viewData["clientstatus"]
            );
            if($result > 0){
                redirectWithMessage("Guardado Exitosamente", "index.php?page=clientes");
            }
            break;
            case "UPD":
                $result = updateCliente($viewData["clientname"],
                $viewData["clientgender"],
                $viewData["clientphone1"],
                $viewData["clientphone2"],
                $viewData["clientmail"],
                $viewData["clientnumber"],
                $viewData["clientbio"],
                $viewData["clientstatus"],
                $viewData["clientid"]
            );
            if($result >= 0){
                redirectWithMessage("Actualizado Exitosamente", "index.php?page=clientes");
            }
            break;
            case 'DEL':
                $result = deleteCliente($viewData["clientid"]);
                if($result > 0){
                    redirectWithMessage("Eliminado Exitosamente", "index.php?page=clientes");
                    die();
                }
            break;
        }
    }

    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }else{
        $clientDBData = getClientById($viewData["clientid"]);
        mergeFullArrayTo($clientDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["clientname"]);
        $viewData["clientgender_FEM"] = ($viewData["clientgender"]=="FEM")?"selected":"";
        $viewData["clientgender_MAS"] = ($viewData["clientgender"]=="MAS")?"selected":"";
        $viewData["clientstatus_ACT"] = ($viewData["clientstatus"]=="ACT")?"selected":"";
        $viewData["clientstatus_INA"] = ($viewData["clientstatus"]=="INA")?"selected":"";
        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
        }
        if($viewData["mode"] == 'DEL'){
            $viewData["deletemsg"] = "Esta seguro que desea Eliminar este registro, Borrara todo los datos.";
        }
    }
    //Crear un token unico
    //Guardar en sesion ese token
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/cliente", $viewData);

}

run();

?>