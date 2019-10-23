<?php
include_once "DAL/bookmarks.php";
require 'utilities/htmlHelper.php';
require 'SessionTimeOut.php';
session_start();
$_SESSION['idFavoris'] = 1;
require 'VerificationAcessIllegalEtSessionExpiree.php';
$content = html_open("div").html_open("b")."Favoris".html_close("b").html_close("div")
.html_open("hr")
        ."<div class=' bookmarks-header-layout bookmark-Header'>"
                .html_open("div").
                    "Titre"
                .html_close("div")
                .html_open("div").
                    "Description"
                .html_close("div")
                .html_open("div").
                    "URL"
                .html_close("div")
                .html_open("div").
                    "Source"
                .html_close("div")
                .html_open("div")
                    ."<a href='AddForm.php'><img src='images/Add.png' alt='Ajouter'>".html_close("a")
                    .html_close("div")
                    .html_open("div")
                .html_close("div")
        .html_close("div")
    .html_close("hr");


$bookmarks = readBookmarks();
foreach($bookmarks as $ligne)
{
    $content .= "<div class='bookmarks-row-layout' >";
    $_SESSION['idFavoris']++;
    
    foreach($ligne as $key2 => $value)
    {
        
        if ($ligne["Id"] != $value)
        {
            if($key2 == 2)
            {
                $content .= html_open("div");
                $content .= html_faviconLinkFromUrl($bookmark['Url']);
                $content .= html_close("div");
            }
            $content .= html_open("div");
            $content .= $value;
            $content .= html_close("div");
        }

        
        
    }
    // $shortUrl = str_replace('http://', '', $ligne['Url']);
    // $shortUrl = str_replace('https://', '', $shortUrl);
    // $content .= '<div class="bookmark-cell">'.$ligne['Title'].'</div>';
    // $content .= '<div class="bookmark-cell">'.$ligne['Description'].'</div>';
    // $content .= '<div class="favicon-cell">'.html_faviconLinkFromUrl($ligne['Url']).html_link($ligne['Url'], $shortUrl, '_blank').'</div>';

    // $content .= '<div class="icon-cell">'.html_icon('images/Modify.png', 'editForm.php?id='.$ligne['Id'], 'Modifier '.$ligne['Title'], 'left').'</div>';
    // $content .= '<div class="icon-cell">'.html_icon('images/Erase.png', 'deleteForm.php?id='.$ligne['Id'], 'Effacer '.$ligne['Title'], 'left').'</div>';

    // $content .= html_open("div")."<a href='EditForm.php'><img value='".$_SESSION['idFavoris']."' src='images/Modify.png' alt='Ajouter' onclick =".getID(this).">".html_close("a").html_close("div");
    // $content .= html_open("div")."<a href='DeleteForm.php'><img value='".$_SESSION['idFavoris']."' src='images/Erase.png' alt='Effacer' onclick =".getID(this).">".html_close("a").html_close("div");
    $content .= html_open("div")."<a href='EditForm.php'><img src='images/Modify.png' alt='Ajouter'>".html_close("a").html_close("div");
    $content .= html_open("div")."<a href='DeleteForm.php'><img src='images/Erase.png' alt='Effacer'>".html_close("a").html_close("div");
    $content .= html_close("div");


    $content .= "<form method='post' action='DeleteForm.php'></form>";
    unset($value);
}

function getId($idImage)
{
    $_SESSION['idImage'] = $idImage;
}
unset($key);
include_once "MasterPage.php";
?>

    