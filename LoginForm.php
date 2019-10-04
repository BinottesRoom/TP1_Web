<?php
<<<<<<< HEAD

function showError($message){
    return "<span style='color:red'>$message</span>";
}

require 'Matos pour le TP/utilities/htmlHelper.php';
require 'SessionTimeOut.php';
session_start();

if (session_Timeout_Occured()) {
    $message = "Expiration de session, veuillez vous connecter à nouveau.";
    release_Session_Timout();
}

//$username = isset($_SESSION['Username'])? $_SESSION['Username'] : '';
$UsernameError = isset($_SESSION['UsernameError'])? $_SESSION['UsernameError'] : '';
$PasswordError = isset($_SESSION['PasswordError'])? $_SESSION['PasswordError'] : '';

$content = "<form method='POST' action='Login.php'>
<input type='text' name='Nom' placeholder='Nom'><br>
<input type='text' name='Username' placeholder=\"Nom d'usager\">
<br><input type='password' name='Password' placeholder='Mot de passe'>";
$content .= showError($UsernameError); 
$content .= "<br><input type='submit' name='login' value='Soumettre'><br>";
$content .= showError($PasswordError);
$content .= html_close("form");
require_once 'MasterPage.php';
=======
$content ="<form method='POST'>
<input type=\"text\" name=\"User\" placeholder=\"Nom d'usager\"><br>
<input type=\"password\" name=\"Password\" placeholder=\"Mot de passe\"><br>
<input type=\"submit\" name=\"login\" value=\"Soumettre\"><br>
</form>";
require_once '../MasterPage.php';
>>>>>>> 9de6f44e9a34abd221d2653004239d5dd9f108c1
require_once 'Login.php';
?>