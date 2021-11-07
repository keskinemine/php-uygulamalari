
<?php

require_once("baglan.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    $anketSorgusu   =   $baglanti->prepare("SELECT * FROM anket LIMIT 1");
    $anketSorgusu->execute();
    $kayitSayisi    =   $anketSorgusu->rowCount();
    $kayit          =   $anketSorgusu->fetch(PDO::FETCH_ASSOC);

    $anketBirinciSikOySayisi    =   $kayit["oysayisibir"];
    $anketIkinciSikOySayisi     =   $kayit["oysayisiki"];
    $anketUcuncuSikOySayisi     =   $kayit["oysayisiuc"];
    $anketToplamOySayisi        =   $kayit["toplamoysayisi"];


    $birinciSikYuzde            =   ($anketBirinciSikOySayisi/$anketToplamOySayisi)*100;
    $birinciSikFormat           =   number_format($birinciSikYuzde, 2, ",", "");
    $ikinciSikYuzde             =   ($anketIkinciSikOySayisi/$anketToplamOySayisi)*100;
    $ikinciSikFormat            =   number_format($ikinciSikYuzde, 2, ",", "");
    $ucuncuSıkYuzde             =   ($anketUcuncuSikOySayisi/$anketToplamOySayisi)*100;
    $ucuncuSikFormat            =   number_format($ucuncuSıkYuzde, 2, ",", "");
    

    if($kayitSayisi>0){
    ?>
        <table>
            <tr>
                <td colspan="2"><?php  echo $kayit["soru"]; ?></td>
            </tr>
            <tr>
                <td class="yuzde">%<?php echo $birinciSikFormat; ?></td>
                <td class="cevap2"><?php  echo $kayit["cevapbir"]; ?></td>
            </tr>
            <tr>
                <td class="yuzde">%<?php echo $ikinciSikFormat; ?></td>
                <td class="cevap2"><?php  echo $kayit["cevapiki"]; ?></td>
            </tr>
            <tr>
                <td class="yuzde">%<?php echo $ucuncuSikFormat; ?></td>
                <td class="cevap2"><?php  echo $kayit["cevapuc"]; ?></td>
            </tr>
            
            <tr class="anket">
                <td colspan="2"><a href="index.php">Ana Sayfaya Dön</a></td>
            </tr>
    </table>
    <?php
    }else{
        header("Location:index.php");
        exit();
    }
    ?>
</body>
</html>


<?php
    $baglanti   = null;
?>