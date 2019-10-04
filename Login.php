<?php
session_start();
require_once 'Matos pour le TP/utilities/cookie.php';
require_once 'cookie.php';
//voir le timeout dans authentification
if(isset($_POST['login']))
{
    $username = $_POST['Username'];
    $psswd = $_POST['Password'];
    $nom = $_POST['Nom'];
    

    $_SESSION['ValidUser'] = true;

    if($username != "bookmarks")
    {
        $_SESSION['ValidUser'] = false;
        $_SESSION['UsernameError'] = "L'utilisateur est invalide!";
    }
    else if($psswd != "manager")
    {
        $_SESSION['ValidUser'] = false;
        $_SESSION['UsernameError'] = "Le mot de passe est invalide!";
    }

    if(!$_SESSION['ValidUser'])
    {
        header('Location:LoginForm.php');
        exit();
    }
    if(!isset($_COOKIE['Nom']))
    cookie_set('Nom',$nom,year(1));
    $nbVisite = 0;
    cookie_set('NbVisites',$nbVisite++,year(1));
    header('Location:List.php');
    exit();
        /*require 'SessionTimeOut.php';
    set_Session_Timeout(2000000000,'LoginForm.php');*/   
}

?>