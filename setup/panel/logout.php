<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 30);
setcookie('key', '', time() - 30);

header("Location: login.php");
exit;




?>