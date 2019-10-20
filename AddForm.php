<?php
//Ajout d'un favori dans la liste
require 'Matos pour le TP/utilities/htmlHelper.php';
require_once 'SessionTimeOut.php';
session_start();
set_Session_Timeout(240,'LoginForm.php');

if(!isset($_SESSION['ValidUser']))
{
    $_SESSION['ValidUser'] = false;
    header('Location:LoginForm.php');
    exit();
}

$content = "<div style=\"display:inline\">";
$content .= html_open("h3");
$content .="Ajout de favori";
$content .= html_close("h3");
$content .= html_close("div");
$content .= "<hr>".html_open("div")."<form method='POST' action='Add.php'>";
$content .= html_open("b").html_label("Titre", "Titre").html_close("b");//titre
$content .= "<br>";
$content .= html_textbox("Titre", "Titre");
$content .= "<br><br>";
$content .= html_open("b").html_label("Description", "Description").html_close("b");//description
$content .= "<br>";
$content .= html_textbox("Description", "Description");
$content .= "<br><br>";
$content .= html_open("b").html_label("URL", "URL").html_close("b");//url
$content .= "<br>";
$content .= html_textbox("URL", "URL");
$content .= "<br><br>";
$content .= html_submit("ajouter", "Soumettre");
$content .= html_close("form");
$content .= html_close("div");
$content .= html_close("hr");

include_once 'MasterPage.php';
?>
<script>
<?php include "js/bookmarkFormValidation.js"; ?>
</script>