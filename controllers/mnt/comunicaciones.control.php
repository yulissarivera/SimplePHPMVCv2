<?php 

require_once "models/mnt/comunicaciones.model.php";
require_once "models/mnt/clientes.model.php";

function run(){
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["clientid"] = 0;

    $modedsc = array(
        "CMN"=>"Comunicaciones Cliente: %s"
    );

    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["clientid"] = intval($_GET["clientid"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=clientes");
            die();
        }
    }

    $viewData["cln_txtfilter"] = "";
    if (isset($_SESSION["cln_txtfilter"])) {
        $viewData["cln_txtfilter"] = $_SESSION["cln_txtfilter"];
    }
    if (isset($_POST["btnFiltrar"])) {
        mergeFullArrayTo($_POST, $viewData);
        $_SESSION["cln_txtfilter"] = $viewData["cln_txtfilter"];
    }
    if ($viewData["cln_txtfilter"] === "") {
        $viewData["comunicaciones"] = getComunicacionesPorCliente($viewData["clientid"]);
    } else {
        die("Hola");
        //$viewData["comunicaciones"] = getComunicacionesPorFiltro($viewData["cln_txtfilter"]);
    }
    
    if($viewData["mode"] === "CMN"){
        $clientDBData = getClientById($viewData["clientid"]);
        mergeFullArrayTo($clientDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["clientname"]);
    }

    renderizar("mnt/comunicaciones", $viewData);
}

run();

?>
