<?php
require_once("baglan.php");
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
    function AcilirListeIcinMenuYaz($menuUstIdDegeri=0, $boslukDegeri=0){
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

                echo "<option value='" . $menuId ."'>" . str_repeat("&nbsp;", $boslukDegeri) . $menuMenuAdi . "</option>";
                AcilirListeIcinMenuYaz($menuId, $boslukDegeri+5);
            }
        }
    }

    function MenuYaz($menuUstIdDegeri=0, $boslukDegeri=0){
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

                echo str_repeat("&nbsp;", $boslukDegeri). $menuMenuAdi . " <a href='guncelle.php?id=" . $menuId . "'>[Güncelle]</a> <a href='sil.php?id=" . $menuId . "'>[Sil]</a><br />";
				MenuYaz($menuId, $boslukDegeri+10);
            }
        }
    }

    //Yeni Menü Ekleme
    ?>
    Menü Ekleme Formu<br>
    <form action="ekle.php" method="POST">
        Üst Menü : <select name="ustMenuSecimi">
            <option value="0">Ana Menü Yap</option>
            <?php AcilirListeIcinMenuYaz();  ?>
        </select><br>
        Menü Adı : <input type="text" name="menuAdi"><br>
        <input type="submit" value="Menü Ekle">
    </form><br><br><br>

    <?php
    //Menüleri Listeleme
    MenuYaz();
    
    $baglanti = null;
    ?>
</body>
</html>