<?php
if(isset($_POST['login']))
{
    $username = $_POST['User'];
    $psswd = $_POST['Password'];

    if($username == "bookmarks" && $psswd == "manager")
    {
        echo "<b>Nom d'usager:</b> $username<br>";
        echo "<b>Mot de passe:</b> $psswd<br>";
    }
}   
?>