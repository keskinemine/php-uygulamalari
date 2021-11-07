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
    $gelenSifre         =   "";
}

if(isset($_POST["adsoyad"])){
    $gelenİsimSoyisim   =   Filtrele($_POST["adsoyad"]);
}else{
    $gelenİsimSoyisim         =   "";
}

if(isset($_POST["emailadresi"])){
    $gelenEmailAdresi        =   Filtrele($_POST["emailadresi"]);
}else{
    $gelenEmailAdresi        =   "";
}

$kontrolSorgusu     =   $baglanti->prepare("SELECT * FROM uyeler WHERE kullaniciadi=? AND emailadresi=?");
$kontrolSorgusu->execute([$gelenKullaniciAdi, $gelenEmailAdresi]);
$kontrolSayisi      =   $kontrolSorgusu->rowCount();

if($kontrolSayisi>0){
    echo "HATA<br>";
    echo "Kullanıcı adı veya e-mail adresi başka bir üye tarafından kullanılmaktadır.<br>";
    echo "Ana sayfaya dönmek için lütfen buraya <a href='index.php'>tıklayınız.</a>";
}else{
    $kayitEkle          =   $baglanti->prepare("INSERT INTO uyeler (kullaniciadi, sifre, adisoyadi, emailadresi, kayittarihi) values (?, ?, ?, ?, ?)");
    $kayitEkle->execute([$gelenKullaniciAdi, $gelenSifre, $gelenİsimSoyisim, $gelenEmailAdresi, $zamanDamgasi]);
    $kayitKontrol       =   $kayitEkle->rowCount();

    if($kayitKontrol>0){
        echo "TEBRİKLER<br>";
        echo "Kullanıcı kaydı başarıyla tamamlandı.<br>";
        echo "Ana sayfaya dönmek için lütfen buraya <a href='index.php'>tıklayınız.</a>";
    }else{
        echo "HATA<br>";
        echo "Kullanıcı kaydı işlemi sırasında beklenmeyen bir hata oluştu.<br>";
        echo "Lütfen daha sonra tekrar deneyiniz.<br>";
        echo "Ana sayfaya dönmek için lütfen buraya <a href='index.php'>tıklayınız.</a>";
    }
}

?>

