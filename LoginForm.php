<?php
function showError($message){
    return "<span style='color:red'>$message</span>";
}

require 'Matos pour le TP/utilities/htmlHelper.php';
session_start();


//$username = isset($_SESSION['Username'])? $_SESSION['Username'] : '';
$UsernameError = isset($_SESSION['UsernameError'])? $_SESSION['UsernameError'] : '';
$PasswordError = isset($_SESSION['PasswordError'])? $_SESSION['PasswordError'] : '';

$content = "<form method='POST' action='Login.php'>";
//if()
$content .= "<input type='text' name='Nom' placeholder='Nom'><br>
<input type='text' name='Username' placeholder=\"Nom d'usager\">
<br><input type='password' name='Password' placeholder='Mot de passe'>";
$content .= showError($UsernameError); 
$content .= "<br><input type='submit' name='login' value='Soumettre'><br>";
$content .= showError($PasswordError);
$content .= html_close("form");
require_once 'MasterPage.php';
require_once 'Login.php';
?>