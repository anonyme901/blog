<?php
//se déconnecter sur le site
$_SESSION = [];
session_destroy();
header('Location: login.php');
?>