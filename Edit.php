<?php // Faire en sorte qu'il prenne les valeurs du favoris et que ce soit les favoris du user connecté seulement
require_once 'SessionTimeOut.php';
session_start();
require 'VerificationAcessIllegalEtSessionExpiree.php';

unset($_SESSION['TitreInvalide']);
unset($_SESSION['DescriptionInvalide']);
unset($_SESSION['URLInvalide']);


$id = $_GET['Id'];


if(isset($_POST['modifier']))
{
    $titre = $_POST['Titre'];
    $description = $_POST['Description'];
    $url = $_POST['URL'];

    $_SESSION['favorisValide'] = true;
    if( $titre == null)//manque probablement des vérifications
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['TitreInvalide'] = 'Le Titre est invalide';
    }
    else if( $description == null)//manque probablement des vérifications
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['DescriptionInvalide'] = 'La description est invalide';
    }
    else if($url == null)//manque probablement des vérifications
    {
        $_SESSION['favorisValide'] = false;
        $_SESSION['URLInvalide'] = 'L`url donnée est invalide';
    }

    if(!$_SESSION['favorisValide'])
    {
        header('EditForm.php');
        exit();
    }

}

header('Location:List.php');
exit();
?>