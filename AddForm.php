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

$content = "<div style=\"display:inline\"><h3>Ajout de favori</h3></div><hr>
<div><form method='POST' action='Add.php'>";
$content .= "<b>".html_label("Titre", "Titre")."</b>";//titre
$content .= "<br>";
$content .= html_textbox("Titre", "Titre");
$content .= "<br><br>";
$content .= "<b>".html_label("Description", "Description")."</b>";//description
$content .= "<br>";
$content .= html_textbox("Description", "Description");
$content .= "<br><br>";
$content .= "<b>".html_label("URL", "URL")."</b>";//url
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