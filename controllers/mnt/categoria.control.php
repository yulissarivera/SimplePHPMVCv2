<?php
require_once "models/mnt/categorias.model.php";

function run(){
    $viewDate = array();
    $viewData["mode"] = "";
    $viewData["modedsc"]= "";
    $viewData["catecode"] = 0;
    $viewData["catename"] = "";
    $viewData["catestatus"] = "ACT";

    $viewData["catestatus_ACT"] = "selected";
    $viewData["catestatus_INA"] = "";
    $viewData["catestatus_EST"] = "";

    $viewData["readonly"] = "";
    $viewData["deletemsg"] = "";
    $viewData["xsstoken"] = "";

    $modedsc = array(
        "INS"=>"Nueva Categoria",
        "UPD"=>"Actualizar categoria %s",
        "DEL"=>"Eliminar Categoria %s",
        "DSP"=>"Detalle de la Categoria %s"
    );

    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["catecode"] = intval($_GET["catecode"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede Realizar esta operacion", "index.php?page=categorias");
            die();
        }
    }

    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST, $viewData);

        if(!(isset($_SESSION["cln_csstoken"])&& $_SESSION["cln_csstoken"] = $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=categorias");
            die();
        }

        switch($viewData["mode"]){
            case "INS":
                $result = addNewCategoria($viewData["catename"], $viewData["catestatus"]);
                if($result > 0){
                    redirectWithMessage("Guardado Exitosamente", "index.php?page=categorias");
                }
            break;
            case "UPD":
                $result = updateCategoria($viewData["catename"], $viewData["catestatus"], $viewData["catecode"]);
                if($result >= 0){
                    redirectWithMessage("Actualizado Exitosamente", "index.php?page=categorias");
                }
            break;
            case "DEL":
                $result = deleteCategoria($viewData["catecode"]);
                if($result > 0){
                    redirectWithMessage("Eliminado Exitosamente", "index.php?page=categorias");
                    die();
                }
        }
    }

    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }
    else{
        $categoriaDBData = getCategoriaById($viewData["catecode"]);
        mergeFullArrayTo($categoriaDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["catename"]);
        $viewData["catestatus_ACT"] = ($viewData["catestatus"]=="ACT")?"selected":"";
        $viewData["catestatus_INA"] = ($viewData["catestatus"]=="INA")?"selected":"";
        $viewData["catestatus_EST"] = ($viewData["catestatus"]=="EST")?"selected":"";
        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
        }
        if($viewData["mode"] == 'DEL'){
            $viewData["deletemsg"] = "Esta Seguro que desea Eliminar este Registro, Borrar todo los datos.";
        }
    }
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/categoria", $viewData);
}

run();

?>