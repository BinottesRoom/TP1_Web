<?php
require_once 'Matos pour le TP/utilities/cookie.php';
require_once 'Matos pour le TP/utilities/form.php';
session_start();

//voir le timeout dans authentification
unset($_SESSION['IllegalAcess']);
unset($_SESSION['UsernameError']);
unset($_SESSION['PasswordError']);
unset($_SESSION['ValidUser']);
unset($_SESSION['Username']);

if(isset($_POST['login']))
{   
    $username = $_POST['Username'];
    $psswd = $_POST['Password'];
    $nom = $_POST['Nom'];

    sanitizeString($username);
    sanitizeString($psswd);
    sanitizeString($nom);
    

    $_SESSION['ValidUser'] = true;

    if($username != "bookmarks")
    {
        $_SESSION['ValidUser'] = false;
        $_SESSION['UsernameError'] = "L'utilisateur est invalide!";
    }
    else if($psswd != "manager")
    {
        $_SESSION['ValidUser'] = false;
        $_SESSION['PasswordError'] = "Le mot de passe est invalide!";
    }

    if(!$_SESSION['ValidUser'])
    {
        header('Location:LoginForm.php');
        exit();
    }
    //cookie_deleteAll();
    if(!isset($_COOKIE['Nom']))
    {
        cookie_set('Nom',$nom,years(1));
        cookie_set('NbVisites',1,years(1));
    }
    else
    {
        cookie_update('NbVisites', ++$_COOKIE['NbVisites'],years(1));
    }
    header('Location:List.php');
}
else if(!isset($_SESSION['ValidUser']))
{
    $_SESSION['ValidUser'] = false;
    header('Location:LoginForm.php');
    exit();
}
?>