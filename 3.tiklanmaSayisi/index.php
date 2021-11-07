<?php

require_once("baglan.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tıklanma Sayısı</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
        <tr class="baslik">
            <td class="sol">Görüntülenme Sayısı Uyugulaması</td>
            <td class="anasayfa"><a href="index.php"> Ana Sayfa </a></td>
        </tr>
        <tr>
            <td class="sol">Makale Başlığı</td>
            <td class="sag">Gösterim Sayısı</td>
        </tr>
        <?php
        $sorgu          =  $baglanti->prepare("SELECT * FROM makaleler ");
        $sorgu->execute();
        $kayitSayisi    =  $sorgu->rowCount();
        $kayitlar       =  $sorgu->fetchAll(PDO::FETCH_ASSOC);

        if($kayitSayisi>0){
            foreach($kayitlar as $satirlar){
        ?>
        <tr class="satirlar">
            <td class="makalebasligi"><a href="oku.php?id=<?php echo $satirlar["id"];?>"> <?php echo $satirlar["makalebasligi"] ?></a></td>
            <td class="sag"><?php echo $satirlar["gosterimsayisi"] ?></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>