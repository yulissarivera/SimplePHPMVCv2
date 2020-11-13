<?php 
/*
cmnid bigint UN AI PK 
clientid bigint 
cmnnotas varchar(5000) 
cmntags varchar(255) 
cmnfching datetime 
cmnusring bigint 
cmntipo
 */

require_once "models/mnt/comunicaciones.model.php";


function run() {
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["cmnid"] = 0;
    $viewData["clientid"] = 0;
    $viewData["cmnnotas"] = "";
    $viewData["cmntags"] = "";
    $viewData["cmntipo"] = "ACT";

    $viewData["cmntipo_ACT"] = "selected";
    $viewData["cmntipo_INA"] = "";

    $viewData["readonly"] = "";
  
    $modedsc = array(
      "INS"=>"Nuevo Comunicacion",
      "DSP"=>"Detalle de Comunicacion"
    );

    if (isset($_GET["mode"])) {
        $viewData["mode"] = $_GET["mode"];
        $viewData["clientid"] = intval($_GET["clientid"]);
        $viewData["cmnid"] = intval($_GET["cmnid"]);
        if (!isset($modedsc[$viewData["mode"]])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=clientes");
            die();
        }
    }

    if (isset($_POST["btnsubmit"])) {
        mergeFullArrayTo($_POST, $viewData);
        //Verificacion de XSS_Token
        if (!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] == $viewData["xsstoken"])) {
            redirectWithMessage("No se puede realizar esta operación.", "index.php?page=comunicaciones&mode=CMN&clientid={{clientid}}");
            die();
        }

        // Validaciones de Entrada de Datos
        switch ($viewData["mode"]){
        case "INS":
            $result = addNewComunicacion(
                $viewData["clientid"],
                $viewData["cmnnotas"],
                $viewData["cmntags"],
                $viewData["cmntipo"]
            );
            if ($result > 0) {
                redirectWithMessage("Guardado Exitosamente", "index.php?page=comunicaciones&mode=CMN&clientid={{clientid}}");
            }
            break;
        }
    }
    if ($viewData["mode"] === "INS") {
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    } else {
        $clientDBData = getComunicacionesById($viewData["cmnid"]);
        mergeFullArrayTo($clientDBData, $viewData);

        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]]);

        $viewData["cmntipo_ACT"] = ($viewData["cmntipo"]=="ACT")?"selected":"";
        $viewData["cmntipo_INA"] = ($viewData["cmntipo"]=="INA")?"selected":"";

        // Sacar la data de la DB
        if ($viewData["mode"] != 'INS') {
            $viewData["readonly"] = "readonly";
        }
    }
    // Crear un token unico
    // Guardar en sesión ese token unico para su verificación posterior
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/comunicacion", $viewData);
}

run();
?>