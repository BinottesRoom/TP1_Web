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
<body class=""> 
<header class="header-layout mainHeaderCell">
    <?php 
    require_once 'Header.php';
    ?>
</header>
<main class="main">
    <?php
    echo $content;
    ?>
</main>
<footer class="footer-layout">
    <?php 
    require_once 'Footer.php';
    echo $contentFooter;
    ?>
</footer>   
</body>

</html>