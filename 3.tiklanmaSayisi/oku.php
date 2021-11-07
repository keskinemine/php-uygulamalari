<?php
require_once("baglan.php");
$gelenID    = Filtrele($_GET["id"]);

$hitGuncelle        =   $baglanti->prepare("UPDATE makaleler SET gosterimsayisi=gosterimsayisi+1 WHERE id = ?");
$hitGuncelle->execute([$gelenID]);
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
            <td class="sol"><b>Görüntülenme Sayısı Uyugulaması</b></td>
            <td class="anasayfa"><a href="index.php"> Ana Sayfa </a></td>
        </tr>

    <?php
        $sorgu          =  $baglanti->prepare("SELECT * FROM makaleler WHERE id= ?");
        $sorgu->execute([$gelenID]);
        $kayitSayisi    =  $sorgu->rowCount();
        $kayit       =  $sorgu->fetch(PDO::FETCH_ASSOC);

        if($kayitSayisi>0){
        ?>
            <tr>
                <td class="orta" colspan="2"><h3><?php echo $kayit["makalebasligi"]; ?></h3></td>
            </tr>
            <tr>
                <td class="orta" colspan="2"><?php echo $kayit["makaleicerigi"]; ?></td>
            </tr>
            <tr>
                <td class="orta" colspan="2">Bu makale <?php echo $kayit["gosterimsayisi"]; ?> defa görüntülendi.</td>
            </tr>
        <?php
        }else{
            header ("Location:index.php");
        }
        ?>

    </table>
</body>
</html>

<?php 

$baglanti = null;

?>
