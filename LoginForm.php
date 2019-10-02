<?php
$content ="<form method='POST'>
<input type=\"text\" name=\"User\" placeholder=\"Nom d'usager\"><br>
<input type=\"password\" name=\"Password\" placeholder=\"Mot de passe\"><br>
<input type=\"submit\" name=\"login\" value=\"Soumettre\"><br>
</form>";
require_once '../MasterPage.php';
require_once 'Login.php';
?>