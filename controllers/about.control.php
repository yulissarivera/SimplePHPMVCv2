<?php
 
function run(){
  $viewData = array(
    "cuenta" => "0801199818341",
    "nombre" => "Yulissa Rivera",
    "correo" => "yulissa.1998.yr@gmail.com",
    );

    $proyectos = array(
        array("id"=>"1", "name"=>"Negocios CMS"),
        array("id"=>"2", "name"=>"Negocios ERP"),
        array("id"=>"3", "name"=>"Negocios RRHH"),
    
    $educacion = array(
        array("id"=>"1", "name"=>" Primaria -- Escuela Urbana Mixta 'República del Perú'"),
        array("id"=>"2", "name"=>" Secundaria -- Centro Educativo Nido de Águilas"),
        array("id"=>"2.1", "name"=>" ----- Título: Bachillerato Técnico Profesional en Informática"),
        array("id"=>"3", "name"=>" Universitaria: Universidad Católica de Honduras"),
        array("id"=>"3.1", "name"=>" ----- Estudiante de 4to Año en Ingeniería en Ciencias de la Computación"),
        array("id"=>"3.2", "name"=>" ----- Certificación Cisco: CCNA R&S: Introduction to Networks/CCNA R&S: Routing and Switching Essentials."),
        array("id"=>"3.3", "name"=>" ----- Participante Ciclo de Conferencias Sistema de Gestión de Calidad. "),
        array("id"=>"3.4", "name"=>" ----- Participante en INNOVATE 2.0"),
    )
);

  $viewData["proyectos"] = $proyectos;
  $viewData["educacion"] = $educacion;
  renderizar("about", $viewData);
}
run();


?>