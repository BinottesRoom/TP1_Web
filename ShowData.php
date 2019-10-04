<?php

    require 'SessionTimeOut.php';
    session_start();
    set_Session_Timeout(2000000000,'LoginForm.php');

    if (isset($_SESSION['validUser'])) {
        echo "<h3>Usager:[". $_SESSION['Username']."]</h3>";
        echo "<a href='logout.php'>Déconnexion</a><hr>";
        echo '<img src="SessionPrinciple.PNG">';

    } else {
        echo "Vous devez vous connecter pour voir cette page<br><br>";
        echo "<a href='loginForm.php'>login</a>";
    }
?>
