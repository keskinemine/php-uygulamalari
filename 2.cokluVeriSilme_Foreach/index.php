<?php
 include ("baglan.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çoklu Kayıt Silme</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <form action="sonuc.php" method="POST">
    <table>
        <?php
        $sorgu          = $baglanti->prepare("SELECT * FROM kisiler");
        $sorgu->execute();
        
        $kayitSayisi    = $sorgu->rowCount();
        $kayitlar       = $sorgu->fetchAll(PDO::FETCH_ASSOC);

        foreach($kayitlar as $kayit){
        ?>
            <tr>
                <td class="check" style="width:25px"><input type="checkbox" name="secim[]" value="<?php echo $kayit["id"]; ?>"></td>
                <td class="kayitSatirlari"><?php echo $kayit["adi"] . " " .$kayit["soyadi"];?></td>
            </tr>



        <?php
        }
        ?>
            <tr>
                <td class="gonder" colspan="2"><input type="submit" class="gonder" value="Seçili Olanları Siliniz"></td>
            </tr>
    
    </table>
   </form>
</body>
</html>

<?php
$baglanti = null;

?>