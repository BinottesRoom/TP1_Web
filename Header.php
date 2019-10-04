<?php
echo "<div>Gestionnaire de favoris";
if(isset($_COOKIE['Nom']))
{
    echo "Visiteur:";
    echo $_COOKIE['Nom'];
    echo "   Nombre de Visites:";// le nb de visites ne s'incrémente pas
    echo $_COOKIE['NbVisites'];
}
echo "</div>";

require_once 'MasterPage.php';
?>