<?php
session_start();
//voir le timeout dans authentification
if(isset($_POST['login']))
{
    $username = $_POST['Username'];
    $psswd = $_POST['Password'];
    

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
    header('Location:List.php');
    exit();
        /*require 'SessionTimeOut.php';
    set_Session_Timeout(2000000000,'LoginForm.php');*/   
}

?>