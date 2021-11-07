<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("baglan.php");

$gelenId    =  Filtrele($_GET["id"]); 

function Filtrele($deger){
	$bir	=	trim($deger);
	$iki	=	strip_tags($bir);
	$uc		=	htmlspecialchars($iki, ENT_QUOTES);
	$sonuc	=	$uc;
	return $sonuc;
}

$menuHiyerarsiniBulDizisi   =       array($gelenId);

function menuHiyerarsiniBul($menuIdDegeri){
    global $baglanti;
    global $menuHiyerarsiniBulDizisi;

    $menuSorgusu              =   $baglanti->prepare("SELECT * FROM menuler WHERE ustid = ?");
    $menuSorgusu->execute([$menuIdDegeri]);
    $menuSorgusuSayi          =   $menuSorgusu->rowCount();
    $menuSorgusuKayitlari     =   $menuSorgusu->fetchAll(PDO::FETCH_ASSOC);

    if($menuSorgusuSayi>0){
        foreach($menuSorgusuKayitlari as $kayitlar){
            $menuId         =     $kayitlar["id"];
            $menuUstId      =     $kayitlar["ustid"];
            $menuMenuAdi    =     $kayitlar["menuadi"];
            $menuHiyerarsiniBulDizisi[]  =  $menuId;
            menuHiyerarsiniBul($menuId);

        }
    }
    return $menuHiyerarsiniBulDizisi;
}

if($gelenId != ""){
    $silinecekMenuler         =   menuHiyerarsiniBul($gelenId);

    foreach($silinecekMenuler as $silinecekId){
        $sil                  =   $baglanti->prepare("DELETE FROM menuler WHERE id = ? LIMIT 1");
        $sil->execute([$silinecekId]);
        $silKontrolSayisi     =   $sil->rowCount();
            if($silKontrolSayisi<1){
                echo "HATA<br>";
                echo "İşlem sırasında beklenmeyen bir hata oluştu. Lütfen daha sonra tekrar deneyiniz. <br>";
                echo "Ana sayfaya dönmek için lütfen buraya <a href='index.php'>tıklayınız.</a>";
            }
    }

    header("Location:index.php");
    exit();
}else{
    echo "HATA<br>";
    echo "Ana sayfaya dönmek için lütfen buraya <a href='index.php'>tıklayınız.</a>";
}

$baglanti       =   null;

?>