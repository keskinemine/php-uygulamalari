<?php
include("baglan.php");

function Filtrele($deger){
    $bir    =   trim($deger);
    $iki    =   strip_tags($bir);
    $uc     =   htmlspecialchars($iki, ENT_QUOTES);
    $sonuc  =   $uc;
    return $sonuc;
}



$gelenSecimDegerleri     =   $_POST["secim"];
$IDler                   =   implode(", ", $gelenSecimDegerleri);


$sil                     =   $baglanti->prepare("DELETE FROM kisiler WHERE id IN($IDler)");
$sil-> execute();

header("location:index.php");
exit();



?>