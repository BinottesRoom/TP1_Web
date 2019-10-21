<?php
require 'AutresFct.php';
require_once 'Matos pour le TP/utilities/cookie.php';
require 'Matos pour le TP/utilities/htmlHelper.php';
require 'SessionTimeOut.php';
session_start();
$_SESSION['IllegalAcess'] = '';
$_SESSION['SessionExpiree'] = '';
if(isset($_SESSION['ValidUser']))
{
    if($_SESSION['ValidUser'] == false)
    {
        $_SESSION['IllegalAcess'] =  'Accès Illégal';
   }
    unset($_SESSION['ValidUser']);
}

if (session_Timeout_Occured()) {
    $_SESSION['SessionExpiree'] ='Session expirée';
    release_Session_Timeout();
}
$UsernameError = isset($_SESSION['UsernameError'])? $_SESSION['UsernameError'] : '';
$PasswordError = isset($_SESSION['PasswordError'])? $_SESSION['PasswordError'] : '';

$content = "<div style=\"display:inline\">Login -<div style=\"color:gray; display:inline\">Veuillez vous connecter</div></div><hr>
<div><form method='POST' action='Login.php'>";
if(!isset($_COOKIE['Nom']))
{
    $content .= html_textbox("Nom", "Nom")."`<br>";
}
$content .= html_textbox("Username", "Nom d'usager");
$content .= showError($UsernameError)."<br>"; 
$content .= html_password("Password", "Mot de passe");
$content .= showError($PasswordError)."<br>";
$content .= html_submit("login", "Soumettre");
$content .= "<br>";
$content .= showError($_SESSION['IllegalAcess']);
$content .= showError($_SESSION['SessionExpiree']);
$content .= html_close("form");
$content .= html_close("div");
$content .= html_close("hr");
require_once 'MasterPage.php';

/*list.php
action
- Trier le tableau de favoris (première clé sur source, deuxième clé sur titre)
réponse
o Un favori par rangée :
 Source si différent du visiteur
 Titre,
 Description,
 Url (hyper lien),
 Si Source = Visiteur, Icone d’édition (hyper lien vers editForm.php?id=X)
 Si Source = Visiteur, Icone de retrait (hyper lien deleteForm.php?id=X)

addForm.php
Important :
- Empêcher l’ajout du caractère ‘|’ dans les champs texte

editForm.php?id=X ( X étant le id du favori à éditer)
action
- Si X existe dans le fichier, récupérer le favori X du fichier bookmarks.txt, sinon redirigez à
loginForm.php avec message « Accès illégal »
- Si Visiteur != Source, redirigez à loginForm.php avec message « Accès illégal »
réponse
- Formulaire de modification d’un favori avec les contrôles suivants peuplés avec les
valeurs du favori X:
o <form action='edit.php' method='post'>
o id du favori masqué (<input type='hidden' name='$id'> )
Important :
- Empêcher l’ajout du caractère ‘|’ dans les champs texte

deleteForm.php?id=X ( x étant le id du favori à éditer)
action
- Si X existe dans le fichier, récupérer le favori X du fichier bookmarks.txt, sinon redirigez à
loginForm.php avec message « Accès illégal »
- Si Visiteur != Source_Favori_X, redirigez à loginForm.php avec message « Accès illégal »
réponse
- Les informations du favori X à effacer
o Titre
o Description
o Url
- Formulaire comportant les contrôles suivants :
o id du favori masqué (<input type='hidden' name='$id'> )

add.php
action
- Filtrer les données provenant du formulaire (balise, ‘|’, espace en trop, etc.)
- Ajout du favori provenant du formulaire dans le fichier bookmarks.txt

edit.php
action
- Récupérer les données du formulaire (ne pas oublier le id_favori)
- Filtrer les données provenant du formulaire (balise, ‘|’, espace en trop, etc.)
- Si id_favori existe dans le fichier, récupérer le favori id_favori du fichier bookmarks.txt,
sinon redirigez à loginForm.php avec message « Accès illégal »
- Si Visiteur != Source_favori, redirigez à loginForm.php avec message « Accès illégal »
- Mise à jour du favori dans le fichier bookmarks.txt

delete.php:
action
- Récupérer le id_favori du formulaire
- Si id_favori existe dans le fichier, récupérer le favori id_favori du fichier bookmarks.txt,
sinon redirigez à login.php avec message « Accès illégal »
- Si Visiteur != Source_favori, redirigez à loginForm.php avec message « Accès illégal »
- Retrait du favori dans le fichier bookmarks.txt*/
?>