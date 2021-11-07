<?php
require_once("baglan.php");

function Filtrele($deger){
	$bir	=	trim($deger);
	$iki	=	strip_tags($bir);
	$uc		=	htmlspecialchars($iki, ENT_QUOTES);
	$sonuc	=	$uc;
	return $sonuc;
}

$gelenId    =  Filtrele($_GET["id"]); 

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sınırsız Kategori Sistemi</title>
</head>

<body>
    <?php
    function AcilirListeIcinMenuYaz($guncellenecekMenuId, $guncellenecekMenuUstId, $menuUstIdDegeri=0, $boslukDegeri=0){
        global $baglanti;

        $menuSorgusu            =   $baglanti->prepare("SELECT * FROM menuler WHERE ustid = ?");
        $menuSorgusu->execute([$menuUstIdDegeri]);
        $menuSorgusuSayisi      =   $menuSorgusu->rowCount();
        $menuSorgusuKayitlari   =   $menuSorgusu->fetchAll(PDO::FETCH_ASSOC);
        
        if($menuSorgusuSayisi>0){
            foreach ($menuSorgusuKayitlari as $kayitlar) {
                $menuId         = $kayitlar["id"];
                $menuUstId      = $kayitlar["ustid"];
                $menuMenuAdi    = $kayitlar["menuadi"];

                if($guncellenecekMenuId!=$menuId){
                    if($guncellenecekMenuUstId==$menuId){
                        echo "<option value='" . $menuId ."' selected='selected'>" . str_repeat("&nbsp;",  $boslukDegeri) . $menuMenuAdi . "</option>";
                    }else{
                        echo "<option value='" . $menuId ."'>" . str_repeat("&nbsp;", $boslukDegeri) . $menuMenuAdi . "</option>";
                    }

                    AcilirListeIcinMenuYaz($guncellenecekMenuId, $guncellenecekMenuUstId, $menuId, $ $boslukDegeri+5);
                }
            }
        }
    }
    
    $sorgu                  =   $baglanti->prepare("SELECT * FROM menuler WHERE id = ? LIMIT 1");
    $sorgu->execute([$gelenId]);
    $sorguSayisi            =   $sorgu->rowCount();
    $sorguKayitlari         =   $sorgu->fetch(PDO::FETCH_ASSOC);
    ?>
    
    Menü Güncelleme Formu<br>
    <form action="guncellesonuc.php?id=<?php echo $sorguKayitlari["id"]; ?>" method="POST">
        Üst Menü : <select name="ustMenuSecimi">
            <option value="0" <?php if($sorguKayitlari["ustid"] ==0){ ?>selected="selected"<?php } ?>>Ana Menü</option>
            <?php AcilirListeIcinMenuYaz($sorguKayitlari["id"], $sorguKayitlari["ustid"]);  ?>
        </select><br>
        Menü Adı : <input type="text" name="menuAdi" value="<?php  echo $sorguKayitlari["menuadi"]; ?>"><br>
        <input type="submit" value="Menü Güncelle">
    </form><br><br><br>

    <?php
    $baglanti = null;
    ?>
</body>
</html>