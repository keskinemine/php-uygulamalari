<?php 

require_once("baglan.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site İçi Arama Uygulaması</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="aramasonuclari.php" method="POST">
        <table>
                <tr>
                    <td><input type="text" name="kelime" id=""></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Arama Yap"></td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr class="left">
                    <td> <?php
                            $gelenKelime    =   Filtrele($_POST["kelime"]);
                            $kosul          =   "%$gelenKelime%";
                            $sorgu          =   $baglanti->prepare("SELECT * FROM esyalar WHERE adi LIKE ?");
                            $sorgu->execute([$kosul]);
                            $kayitSayisi    =   $sorgu->rowCount();
                            $kayitlar       =   $sorgu->fetchAll(PDO::FETCH_ASSOC);

                            echo "<b>Bulunan Kayıtlar </b> <br>";
                            foreach($kayitlar as $satirlar){
                                echo $satirlar["adi"] . "<br>";
                            }
                        ?>
                    </td>
                </tr>
        </table>
    </form>


    
</body>
</html>


<?php 

$baglanti = null;

?>