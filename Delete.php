<?php
require_once 'SessionTimeOut.php';
session_start();
require 'VerificationAcessIllegalEtSessionExpiree.php';
header('Location:List.php');
exit();
?>