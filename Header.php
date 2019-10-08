<?php
echo "<div><h1>Gestionnaire de favoris</h1>";
if(isset($_COOKIE['Nom']))
{
    echo "Visiteur:";
    echo $_COOKIE['Nom'];
    echo "          Nombre de Visites:";
    echo $_COOKIE['NbVisites'];
}

if(isset($_SESSION['ValidUser']) && $_SESSION['ValidUser'] == true)
{
   echo '<a href="Logout.php"><img src="Matos pour le TP/images/Exit.png">'; 
}

echo "</div>";
require_once 'MasterPage.php';
?>