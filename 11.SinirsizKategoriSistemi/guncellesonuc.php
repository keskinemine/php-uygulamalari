<?php
require_once("baglan.php");

function Filtrele($deger){
	$bir	=	trim($deger);
	$iki	=	strip_tags($bir);
	$uc		=	htmlspecialchars($iki, ENT_QUOTES);
	$sonuc	=	$uc;
	return $sonuc;
}

$gelenId                =    Filtrele($_GET["id"]); 
$gelenUstMenuSecimi     =    Filtrele($_POST["ustMenuSecimi"]);
$gelenMenuAdi           =    Filtrele($_POST["menuAdi"]);

if(($gelenId != "") and ($gelenUstMenuSecimi != "") and ($gelenMenuAdi != "")){
    $guncelle                   =   $baglanti->prepare("UPDATE menuler SET ustid = ?, menuadi = ? WHERE id = ? LIMIT 1");
    $guncelle->execute([$gelenUstMenuSecimi, $gelenMenuAdi, $gelenId]);
    $guncelleKontrolSayisi      =   $guncelle->rowCount();

    if($guncelleKontrolSayisi>0){
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
    echo "Güncelleme sayfasına geri dönmek için lütfen buraya <a href ='guncelle.php?id=" . $gelenId . "'>tıklayınız</a>.";
}

$baglanti = null;


?>

