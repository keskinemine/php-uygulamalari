<?php

try{
    $baglanti = new PDO ("mysql:host=localhost;dbname=veriSilme;charset=UTF8", "root", "");
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listelerde Satır Renklendirme</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
        <tr class="baslik">
            <td class="left"> Ürün Adı</td>
            <td class="right"> Ürün fiyatı</td>
        </tr>
        <?php
        $sorgu          =   $baglanti->prepare("SELECT * FROM urunler");
        $sorgu->execute();
        $sorguSayisi    =   $sorgu->rowCount();
        $sorguKayitlari =   $sorgu->fetchAll(PDO::FETCH_ASSOC);

        $birinciRenk    =   "#dfdfdf";
        $ikinciRenk     =   "#FFFFFF";
        $renkIcinSayi   =   0;

        foreach($sorguKayitlari as $satirlar){
            if($renkIcinSayi%2){
                $arkaplanRengi  = $birinciRenk;
            }else{
                $arkaplanRengi  = $ikinciRenk;
            }
        ?>
        <tr height="30px" bgcolor="<?php echo $arkaplanRengi; ?>" onMouseOver="this.bgColor='c2cedb';" onMouseOut="this.bgColor='<?php echo $arkaplanRengi; ?>'; " style="cursor: pointer;">
            <td class="satir"><?php  echo $satirlar["urunadi"]; ?> </td>
            <td class="satir"><?php  echo $satirlar["urunfiyati"]; ?> </td>
        </tr>
        <?php
            $renkIcinSayi++;
        }
        ?>
    </table>
</body>
</html>
<?php
$baglanti = null;
?>