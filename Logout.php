<?php
require 'SessionTimeOut.php';
session_start();
delete_session();
header('Location:LoginForm.php');
?>