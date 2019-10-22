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


    $donneesPost = array([$_SESSION['idFavoris'], $titre, $description, $url, $_COOKIE['Nom']]);
    $donneesPost['Id']             = $_SESSION['idFavoris'];
    $donneesPost['Title']          = sanitizeString($titre);
    $donneesPost['Description']    = sanitizeString($description);
    $donneesPost['Url']            = sanitizeString($url);
    $donneesPost['Source']         = $_COOKIE['Nom']; 

    $_SESSION['favorisValide'] = true;
    if($titre.trim(" ") == "" || $titre == null)//manque probablement des vérifications
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['TitreInvalide'] = 'Le Titre est invalide';
    }
    else if($description.trim(" ") == "" || $description == null)//manque probablement des vérifications
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['DescriptionInvalide'] = 'La description est invalide';
    }
    else if($url.trim(" ") == "" || $url == null)//manque probablement des vérifications
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