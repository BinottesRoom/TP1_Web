<?php
include_once "Matos pour le TP/DAL/bookmarks.php";
require 'Matos pour le TP/utilities/htmlHelper.php';
require 'SessionTimeOut.php';
session_start();
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
                    ."<a href='AddForm.php'><img src='Matos pour le TP/images/Add.png' alt='Ajouter'>".html_close("a")
                    .html_close("div")
                    .html_open("div")
                .html_close("div")
        .html_close("div")
    .html_close("hr");

foreach(readBookmarks() as $key => $ligne)
{
    $content .= "<div class='bookmarks-row-layout' >";

    foreach($ligne as $key2 => $value)
    {
        if ($ligne["Id"] != $value)
        {
            $content .= html_open("div");
            $content .= $value;
            $content .= html_close("div");
        }
        
    }
        $content .= html_open("div")."<a href='EditForm.php'><img src='Matos pour le TP/images/Modify.png' alt='Ajouter'>".html_close("a").html_close("div");
        $content .= html_open("div")."<a href='DeleteForm.php'><img src='Matos pour le TP/images/Erase.png' alt='Effacer'>".html_close("a").html_close("div");
        $content .= html_close("div");
}
include_once "MasterPage.php";
?>

    