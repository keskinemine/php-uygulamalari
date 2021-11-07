<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<?php

try{
    $baglanti= new PDO("mysql:host=localhost;dbname=veriSilme;charset=UTF8","root","");
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}


function Filtrele($deger){
    $bir    = trim($deger);
    $iki    = strip_tags($bir);
    $uc     = htmlspecialchars($iki, ENT_QUOTES);
    $sonuc  = $uc;
    return $sonuc;
}

?>