<?php
include_once "Matos pour le TP/DAL/bookmarks.php";
require 'SessionTimeOut.php';
session_start();
set_Session_Timeout(240,'LoginForm.php');

if(!isset($_SESSION['ValidUser']))
{
    $_SESSION['ValidUser'] = false;
    header('Location:LoginForm.php');
    exit();
}
$content = "
<div class=''><b>Favoris</b></div>
    <hr>
        <div class=' bookmarks-header-layout bookmark-Header'>
                <div>
                    Titre
                </div>
                <div>
                    Description
                </div>
                <div>
                    URL
                </div>
                <div>
                    Source
                </div>
                <div>
                <a href='AddForm.php'><img src='Matos pour le TP/images/Add.png' alt='Ajouter'></a>
                </div>
                <div>
                    
                </div>
        </div>
    </hr>";

foreach(readBookmarks() as $key => $ligne)
{
    $content .= "<div class='bookmarks-row-layout' >";

    foreach($ligne as $key2 => $value)
    {
        if ($ligne["Id"] != $value)
        {
            $content .= "<div>";
            $content .= $value;
            $content .= "</div>";
        }
        
    }
        $content .= "<div><a href='EditForm.php'><img src='Matos pour le TP/images/Modify.png' alt='Ajouter'></a></div>";
        $content .= "<div><a href='DeleteForm.php'><img src='Matos pour le TP/images/Erase.png' alt='Effacer'></a></div>";
        $content .= "</div>";
}
$content .= "</div>";
include_once "MasterPage.php";
?>

    