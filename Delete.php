<?php
require_once 'SessionTimeOut.php';
include_once "DAL/bookmarks.php";
session_start();
require 'VerificationAcessIllegalEtSessionExpiree.php';

unset($_SESSION['TitreInvalide']);
unset($_SESSION['DescriptionInvalide']);
unset($_SESSION['URLInvalide']);



if(isset($_POST['delete']))
{
    // $titre = $_POST['Titre'];
    // $description = $_POST['Description'];
    // $url = $_POST['URL'];

    $_SESSION['favorisValide'] = true;
    // if($titre.trim(" ") == "" || $titre == null)//manque probablement des vérifications
    // {
    //     $_SESSION['favorisValide'] = false;
    //     $_SESSION['TitreInvalide'] = 'Le Titre est invalide';
    // }
    // else if($description.trim(" ") == "" || $description == null)//manque probablement des vérifications
    // {
    //     $_SESSION['favorisValide'] = false;
    //     $_SESSION['DescriptionInvalide'] = 'La description est invalide';
    // }
    // else if($url.trim(" ") == "" || $url == null)//manque probablement des vérifications
    // {
    //     $_SESSION['favorisValide'] = false;
    //     $_SESSION['URLInvalide'] = 'L`url donnée est invalide';
    // }

    if(!$_SESSION['favorisValide'])
    {
        header('DeleteForm.php');
        exit();
    } 
    else
    {
        deleteBookmark($_SESSION['idDelete']);
    }
} 
header('Location:List.php');
?>