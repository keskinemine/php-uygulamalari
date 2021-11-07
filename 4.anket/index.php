<?php

require_once("baglan.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anket Deneme</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    $anketSorgusu   =   $baglanti->prepare("SELECT * FROM anket LIMIT 1");
    $anketSorgusu->execute();
    $kayitSayisi    =   $anketSorgusu->rowCount();
    $kayit          =   $anketSorgusu->fetch(PDO::FETCH_ASSOC);

    if($kayitSayisi>0){
    ?>
    <form action="oyver.php" method="POST">
        <table>
            <tr>
                <td colspan="2"><?php  echo $kayit["soru"]; ?></td>
            </tr>
            <tr>
                <td><input type="radio" name="cevap" value="1"></td>
                <td class="cevap"><?php  echo $kayit["cevapbir"]; ?></td>
            </tr>
            <tr>
                <td><input type="radio" name="cevap" value="2"></td>
                <td class="cevap"><?php  echo $kayit["cevapiki"]; ?></td>
            </tr>
            <tr>
                <td><input type="radio" name="cevap" value="3"></td>
                <td class="cevap"><?php  echo $kayit["cevapuc"]; ?></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Oyumu Gönder"></td>
            </tr>
            <tr class="anket">
                <td colspan="2"><a href="sonuclar.php">Anket Sonuçlarını göster</a></td>
            </tr>
        </table>
    </form>
    <?php
    }else{
    ?>
    Anket bulunamıyor.
    <?php
    }
    ?>
</body>
</html>


<?php
    $baglanti   = null;
?>