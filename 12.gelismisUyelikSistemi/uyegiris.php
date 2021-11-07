<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("baglan.php");

if(isset($_POST["kullaniciadi"])){
    $gelenKullaniciAdi  =   Filtrele($_POST["kullaniciadi"]);
}else{
    $gelenKullaniciAdi  =   "";
}

if(isset($_POST["sifre"])){
    $gelenSifre         =   Filtrele($_POST["sifre"]);
}else{
    $gelenSifre  =   "";
}

$kontrolSorgusu     =   $baglanti->prepare("SELECT * FROM uyeler WHERE kullaniciadi=? AND sifre=?");
$kontrolSorgusu->execute([$gelenKullaniciAdi, $gelenSifre]);
$kontrolSayisi      =   $kontrolSorgusu->rowCount();

if($kontrolSayisi>0){
    $_SESSION["Kullanici"]  = $gelenKullaniciAdi;
    header("Location:index.php");
    exit();
}else{
    echo "HATA<br>";
    echo "Girilen bilgiler ile eşleşen kullanıcı kaydı bulunmamaktadır.<br>";
    echo "Ana sayfaya dönmek için lütfen buraya <a href='index.php'>tıklayınız.</a><br>";
}


?>

