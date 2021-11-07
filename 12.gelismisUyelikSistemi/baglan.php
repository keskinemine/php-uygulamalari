<?php

session_start(); ob_start();

try{
    $baglanti = new PDO("mysql:host=localhost;dbname=veriSilme;charset=UTF8", "root", "");
}catch(PDOException $e){
    echo "Bağlantı hatası <br>". $e->getMessage();
    die();
}

function Filtrele($deger){
    $bir    =   trim($deger);
    $iki    =   strip_tags($bir);
    $uc     =   htmlspecialchars($iki, ENT_QUOTES);
    $sonuc  =   $uc;
    return $sonuc;
}

$zamanDamgasi   = time();

if(isset($_SESSION["Kullanici"])){
    $uyelerSorgusu          =   $baglanti->prepare("SELECT * FROM uyeler WHERE kullaniciadi=?");
    $uyelerSorgusu->execute([$_SESSION["Kullanici"]]);
    $uyelerKayitSayisi      =   $uyelerSorgusu->rowCount();
    $uyelerKaydi            =   $uyelerSorgusu->fetch(PDO::FETCH_ASSOC);

    if($uyelerKayitSayisi>0){
        $uyeninAdiSoyadi    =   $uyelerKaydi["adisoyadi"];
    }else{
        $uyeninAdiSoyadi    =   "";
    }
}

?>