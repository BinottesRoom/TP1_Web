<?php 
require 'SessionTimeOut.php';
session_start();
require 'VerificationAcessIllegalEtSessionExpiree.php';

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
        $montantDonnees = sizeof($donneesPost);
        $fwrite = fopen($fichier, 'w');

        fwrite($fichier, $_SESSION['idFavoris'].'|');
        fwrite($fichier, $titre.'|');
        fwrite($fichier, $description.'|');
        fwrite($fichier, $url.'|');
        fwrite($fichier, $_COOKIE['Nom'].'|');
        // for ($i = 0; i < count($donneesPost); $i++)
        // {
        //     fwrite($fichier, "$donneesPost[$i]".'|');
        // }
    }

}

header('Location:List.php');
exit();
?>