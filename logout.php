<?php require_once("Include/session.php");?>
<?php require_once("Include/functions.php");?>

<?php

$_SESSION['user_id']=null;
session_destroy();
redirect_to("Login.php");
?>
