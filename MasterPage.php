<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP1_Web_J.C._I.L.</title>
    <?php
    require_once 'AllCssLink.php';
    require_once 'AllJsLinks.php';
     ?>
</head>
<header>
    <?php 
    require_once 'Header.php';
    echo $contentHeader;
    ?>
</header>
<body> 
    <?php
    echo $content;
    ?>
</body>
<footer>
    <?php 
    require_once 'Footer.php';
    echo $contentFooter;
    ?>
</footer>   
</html>