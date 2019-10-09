<?php
function showError($message){
    return "<span style='color:red'>$message</span>";
}
require_once 'Matos pour le TP/utilities/cookie.php';
require 'Matos pour le TP/utilities/htmlHelper.php';
require 'SessionTimeOut.php';
session_start();
$_SESSION['IllegalAcess'] =  'Accès Illégal';

if(isset($_SESSION['ValidUser']))
{
    if($_SESSION['ValidUser'] == false)
    {
        echo $_SESSION['IllegalAcess'];
    }
    unset($_SESSION['ValidUser']);
}

if (session_Timeout_Occured()) {
    echo 'Session expirée';
    release_Session_Timeout();
}
$UsernameError = isset($_SESSION['UsernameError'])? $_SESSION['UsernameError'] : '';
$PasswordError = isset($_SESSION['PasswordError'])? $_SESSION['PasswordError'] : '';

$content = "<div style=\"display:inline\">Login -<div style=\"color:gray; display:inline\">Veuillez vous connecter</div></div><hr>
<div><form method='POST' action='Login.php'>";
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
$content .= html_close("div");
$content .= html_close("hr");
require_once 'MasterPage.php';
?>