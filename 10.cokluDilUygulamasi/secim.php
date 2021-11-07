<?php
session_start();

$gelenDilSecimi         = $_GET["DilSecimi"];

$_SESSION["SiteDili"]   = $gelenDilSecimi;

header("Location:index.php");
exit();

?>