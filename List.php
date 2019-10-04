<style>
    table
    {
        min-width:100%;
    }   
</style>
<?php
include_once "Matos pour le TP/DAL/bookmarks.php";

$content = "
<div class = 'section'>
    <table>
        <tr class='bookmarks-header-layout'>
                <th>
                    Titre
                </th>
                <th>
                    Description
                </th>
                <th>
                    URL
                </th>
                <th>
                    Source
                </th>
                <th>
                <img src='Matos pour le TP/images/Add.png' alt='Ajouter'>
                </th>
                <th>
            
                </th>
        </tr>";

foreach(readBookmarks() as $key => $ligne)
{
    $content .= "<tr>";

    foreach($ligne as $key2 => $value)
    {
        if ($ligne["Id"] != $value)
        {
            $content .= "<td>";
            $content .= $value;
            $content .= "</td>";
        }
    }
    $content .= "</tr>";
}
$content .= "</table></div>";




include_once "MasterPage.php";

?>

    