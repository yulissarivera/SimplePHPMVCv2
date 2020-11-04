<?php

function run(){
    $viewData = array();
    $viewData["categorias"]= getAllCategorias();
    renderizar("mnt/categorias", $viewData);
}

run();

?>