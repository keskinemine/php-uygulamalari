<?php
require_once("baglan.php");

function Filtrele($deger){
	$bir	=	trim($deger);
	$iki	=	strip_tags($bir);
	$uc		=	htmlspecialchars($iki, ENT_QUOTES);
	$sonuc	=	$uc;
	return $sonuc;
}

$gelenUstMenuSecimi     =       Filtrele($_POST["ustMenuSecimi"]);
$gelenMenuAdi           =       Filtrele($_POST["menuAdi"]);

if(($gelenUstMenuSecimi != "") and ($gelenMenuAdi != "")){

    $ekle                   =   $baglanti->prepare("INSERT INTO menuler (ustid, menuadi) values (?, ?)");
    $ekle->execute([$gelenUstMenuSecimi, $gelenMenuAdi]);
    $ekleKontrolSayisi      =   $ekle->rowCount();

    if($ekleKontrolSayisi>0){
        header("Location:index.php");
        exit();
    }else{
        echo "HATA<br />";
        echo "İşlem sırasında beklenmeyen bir hata oluştu. Lütfen daha sonra tekrar deneyiniz. <br>";
        echo "Ana sayfaya dönmek için <a href ='index.php'>tıklayınız</a>.";
    }
}else{  
    echo "HATA<br />";
    echo "Lütfen boş alan bırakmayınız. <br>";
    echo "Ana sayfaya dönmek için <a href ='index.php'>tıklayınız</a>.";
}

$baglanti = null;


?>

