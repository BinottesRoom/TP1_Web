<style>
    table
    {
        min-width:100%;
    }
    tr
    {
        border: 3px solid red;
    }
</style>
<?php
include_once "Matos pour le TP/DAL/bookmarks.php";

$content = "
<div class = 'section'>
        <div class='bookmarks-header-layout bookmark-Header'>
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
                    <img src='Matos pour le TP/images/Add.png' alt='Ajouter'>
                </div>
                <div>
                    &nbsp;
                </div>
        </div>";

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
    $content .= "</div>";
}
$content .= "</div></div>";
include_once "MasterPage.php";
?>

    