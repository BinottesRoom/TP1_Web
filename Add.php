<?php 
require 'SessionTimeOut.php';
session_start();
require 'VerificationAcessIllegalEtSessionExpiree.php';

if(isset($_POST['ajouter']))

$titre = $_POST['Titre'];
$description = $_POST['Description'];
$url = $_POST['URL'];


header('Location:List.php');
exit();
?>