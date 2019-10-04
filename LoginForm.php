<?php
function showError($message){
    return "<span style='color:red'>$message</span>";
}
require_once 'Matos pour le TP/utilities/cookie.php';
require 'Matos pour le TP/utilities/htmlHelper.php';
session_start();


//$username = isset($_SESSION['Username'])? $_SESSION['Username'] : '';
$UsernameError = isset($_SESSION['UsernameError'])? $_SESSION['UsernameError'] : '';
$PasswordError = isset($_SESSION['PasswordError'])? $_SESSION['PasswordError'] : '';

$content = "<form method='POST' action='Login.php'>";
//if()
if(!isset($_COOKIE['Nom']))
{
    $content .= "<input type='text' name='Nom' placeholder='Nom'><br>";
}
$content .= "<input type='text' name='Username' placeholder=\"Nom d'usager\">";
$content .= showError($UsernameError); 
$content .= "<br><input type='password' name='Password' placeholder='Mot de passe'>";
$content .= showError($PasswordError);
$content .= "<br><input type='submit' name='login' value='Soumettre'><br>";
$content .= html_close("form");
require_once 'MasterPage.php';
require_once 'Login.php';
?>