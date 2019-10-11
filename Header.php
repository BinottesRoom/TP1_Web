<?php
require_once 'Matos pour le TP/utilities/htmlHelper.php';

echo html_open("div");
echo html_image("favicon­.ico", "favicon");
echo html_close("div");
if(isset($_COOKIE['Nom']))
{
    echo "Visiteur:";
    echo $_COOKIE['Nom'];
    echo "          Nombre de Visites:";
    echo $_COOKIE['NbVisites'];
}

if(isset($_SESSION['ValidUser']) && $_SESSION['ValidUser'] == true)
{
   echo '<a href="Logout.php"><img src="Matos pour le TP/images/Exit.png"></a>'; 
}

echo "</div>";
require_once 'MasterPage.php';
?>