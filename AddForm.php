<?php
//Ajout d'un favori dans la liste
require 'Matos pour le TP/utilities/htmlHelper.php';


$content = "<div style=\"display:inline\"><b>Ajout de favori</b></div><hr>
<div><form method='POST' action='Add.php'>";
$content .= html_label("Titre", "Titre");//titre
$content .= "<br>";
$content .= html_textbox("Titre", "Titre");
$content .= "<br><br>";
$content .= html_label("Description", "Description");//description
$content .= "<br>";
$content .= html_textbox("Description", "Description");
$content .= "<br><br>";
$content .= html_label("URL", "URL");//url
$content .= "<br>";
$content .= html_textbox("URL", "URL");
$content .= "<br><br>";
$content .= html_submit("login", "Soumettre");
$content .= html_close("form");
$content .= html_close("div");
$content .= html_close("hr");
include_once 'MasterPage.php';
?>