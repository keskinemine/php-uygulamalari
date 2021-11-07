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


foreach($gelenSecimDegerleri as $silinecekdeger){
    $silinecekID    =   Filtrele($silinecekdeger);

    $sil  = $baglanti->prepare("DELETE FROM kisiler WHERE id = ? LIMIT 1");
    $sil->execute([$silinecekID]);   
}

header("location:index.php");
exit();



?>