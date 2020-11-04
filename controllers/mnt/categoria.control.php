<?php
  
require_once 'models/mnt/categorias.model.php';

function run(){
    $viewData=array();
    $viewData["mode"]="";
    $viewData["modedsc"]="";
    $viewData["catecod"]=0;
    $viewData["catenom"]="";
    $viewData["cateest"]="";
    $modedsc = array(
        "INS"=>"Nueva Categoría",
        "UPD"=>"Actualizar",
        "VS"=> "Ver"
    );

    if(isset($_GET["mode"])){
       $viewData["mode"] =$_GET["mode"];
       $viewData["catecod"]=intval($_GET["catecod"]);
       if(!isset($modedsc[$viewData["mode"]])){
           redirectWithMessage("La acción no se puede ejecutar.", "index.php?page=categorias");
           die();
       } 

    }

    switch ($viewData["mode"]){
        case "INS":
            $result = addNewCategoria(
                $viewData["catenom"],
                $viewData["cateest"]

            );
            if ($result > 0) {
                redirectWithMessage("Registro guardado exitosamente", "index.php?page=categorias");
                die();
            }
            break;
        }

        if($viewData["mode"]==="INS"){
            $viewData["modedsc"]=$modedsc[$viewData["mode"]];
        }else{
            $categoriaDBData = getcategoriaById($viewData["catecod"]);
            mergeFullArrayTo($categoriaDBData, $viewData);
            $viewData["modedsc"]=sprintf($modedsc[$viewData["mode"]])
            }   

            renderizar("mnt/categoria", $viewData);
        }  


?>