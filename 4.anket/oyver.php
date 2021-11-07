
<?php

require_once("baglan.php");

$gelenCevap         =       Filtrele($_POST["cevap"]);

$kontrolSorgusu     =       $baglanti->prepare("SELECT * FROM  oykullananlar WHERE ipadresi = ? AND tarih >= ?");
$kontrolSorgusu->execute([$ipadresi, $zamaniGeriAl  ]);
$kontrolSayisi      =       $kontrolSorgusu->rowCount();

if($kontrolSayisi>0){
    echo    "HATA <br>";
    echo    "Daha önce oy kullanmışsınız. Lütfen en az 24 saat sonra tekrar deneyiniz.<br>";
    echo    "Anasayfaya dönmek için <a href='index.php'>tıklayınız</a>";
}else{
    if($gelenCevap==1){
            $guncelle   =   $baglanti->prepare("UPDATE anket SET oysayisibir= oysayisibir+1, toplamoysayisi=toplamoysayisi+1");
            $guncelle->execute();
    }elseif($gelenCevap==2){
            $guncelle   =   $baglanti->prepare("UPDATE anket SET oysayisiki= oysayisiki+1, toplamoysayisi=toplamoysayisi+1");
            $guncelle->execute();
    }elseif($gelenCevap==3){
            $guncelle   =   $baglanti->prepare("UPDATE anket SET oysayisiuc= oysayisiuc+1, toplamoysayisi=toplamoysayisi+1");
            $guncelle->execute();
    }else{
        echo    "HATA <br>";
        echo    "Cevap bulunamıyor.<br>";
        echo    "Anasayfaya dönmek için <a href='index.php'>tıklayınız</a>";
    }

    $ekle           =   $baglanti->prepare("INSERT INTO oykullananlar (ipadresi, tarih) values (?,?)");
    $ekle->execute([$ipadresi, $zamanDamgasi]);
    $ekleKontrol    =   $ekle->rowCount();

    if($ekleKontrol>0){
        echo    "TEŞEKKÜRLER <br>";
        echo    "Vermiş olduğunuz oy sisteme kaydedildi.<br>";
        echo    "Anasayfaya dönmek için <a href='index.php'>tıklayınız</a>";
    }else{
        echo    "HATA <br>";
        echo    "İşlem sırasında bir hata oluştu. Lütfen daha sonra tekrar deneyiniz!<br>";
        echo    "Anasayfaya dönmek için <a href='index.php'>tıklayınız</a>";
    }
}


    $baglanti   = null;
?>