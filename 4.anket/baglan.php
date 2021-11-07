<?php
try{ 
    $baglanti = new PDO ("mysql:host=localhost;dbname=redpen_anket;charset=UTF8","redpen_anket","123");
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}

function Filtrele($deger){
    $bir    =   trim($deger);
    $iki    =   strip_tags($bir);
    $uc     =   htmlspecialchars($iki, ENT_QUOTES);
    $sonuc  =   $uc;
    return $sonuc;
}

$ipadresi           =   $_SERVER["REMOTE_ADDR"];
$zamanDamgasi       =time();
$oyKullanmaSiniri   =86400; //Saniye cinsinden bir gün
$zamaniGeriAl       =$zamanDamgasi-$oyKullanmaSiniri;
?>