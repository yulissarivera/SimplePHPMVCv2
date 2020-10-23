<?php

function run(){
    $viewData = array(
        "Cuenta"=>"0801199615915",
        "Nombre"=>"Moises Abraham Bustillo Portillo",
        "Correo"=>"moyporti15@gmail.com"
    );

    $diplomas = array(
        array("id"=>"1", "name"=>"Certificado de Redes I CCNA", "tipo"=>"Cisco Networking Academy", "tiempo"=>"2019"),
        array("id"=>"2", "name"=>"Diploma del congreso y talleres INNOVATE HN", "tipo"=>"UNICAH", "tiempo"=>"2017"),
        array("id"=>"3", "name"=>"Certificado Internacional de Preparacion Profesional ", "tipo"=>"USAID", "tiempo"=>"2014"),
        array("id"=>"4", "name"=>"Reconocimiento del taller de Capacitacion sobre adolescencia, sexualidad", "tipo"=>" Asociacion jovenes en movimiento", "tiempo"=>"2012"),
        array("id"=>"5", "name"=>"Diploma de Discipulado I", "tipo"=>"Iglesia Bautista Hebron IBH", "tiempo"=>"2012"),
        array("id"=>"6", "name"=>"Diploma de curso de Guitarra ", "tipo"=>"UPNFM ", "tiempo"=>"2010"),
        array("id"=>"7", "name"=>"Certificado del curso de construccion de puertas exteriores e interiores", "tipo"=>"INFOP", "tiempo"=>"2010"),
        array("id"=>"8", "name"=>"Diploma de taller de la disciplina de musica", "tipo"=>"Secretaria de Finanzas", "tiempo"=>"2007"),
        array("id"=>"9", "name"=>"Diploma del curso Salud Comunitaria", "tipo"=>"Hondureño de Formacion Integral", "tiempo"=>"2004")
    );

    $viewData["diplomas"] = $diplomas;
    renderizar("about", $viewData);
}

run();

?>