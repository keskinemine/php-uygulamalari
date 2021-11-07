<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("baglan.php");
unset($_SESSION["Kullanici"]);
session_destroy();
header("Location:index.php");
exit();
?>

