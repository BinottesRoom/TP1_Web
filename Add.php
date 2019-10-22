<?php 
require 'SessionTimeOut.php';
session_start();
require 'VerificationAcessIllegalEtSessionExpiree.php';
include_once 'utilities/form.php';
require 'DAL/bookmarks.php';

unset($_SESSION['TitreInvalide']);
unset($_SESSION['DescriptionInvalide']);
unset($_SESSION['URLInvalide']);

if(isset($_POST['ajouter']))
{
    $titre = $_POST['Titre'];
    $description = $_POST['Description'];
    $url = $_POST['URL'];
    $fichier = "data/bookmarks.txt";

    $donneesPost['Id']             = $_SESSION['idFavoris'];
    $donneesPost['Title']          = sanitizeString($titre);
    $donneesPost['Description']    = sanitizeString($description);
    $donneesPost['Url']            = sanitizeString($url);
    $donneesPost['Source']         = $_COOKIE['Nom']; 


    $_SESSION['favorisValide'] = true;
    if(str_word_count($titre,0) == 0)
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['TitreInvalide'] = 'Le Titre est invalide';
    }
    else if(trim($description) == "" || $description == null)
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['DescriptionInvalide'] = 'La description est invalide';
    }
    else if(trim($url) == "" || $url == null)
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['URLInvalide'] = 'L`url donnée est invalide';
    }
    

    if(!$_SESSION['favorisValide'])
    {
        header('AddForm.php');
        exit();
    }
    else
    {
        addBookmark($donneesPost);
    }

}

header('Location:List.php');
exit();
?>