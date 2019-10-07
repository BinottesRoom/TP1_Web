<?php
require 'sessionTimeOut.php';
session_start();
delete_session();
header('Location:loginForm.php');
?>