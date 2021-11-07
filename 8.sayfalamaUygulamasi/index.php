<?php
try{
$baglanti = new PDO ("mysql:host=localhost;dbname=veriSilme;charset=UTF8","root","");
}catch(PDOException $e){
    echo "Bağlantı Sorunu: <br>" . $e->getMessage();
    die();
}

if(isset($_REQUEST["Sayfalama"])){
    $gelenSayfalama     =       $_REQUEST["Sayfalama"];
}else{
    $gelenSayfalama     =       1;
}

$sayfalamaIcinSolveSagButonSayisi        =   3;
$sayfaBasinaGosterilecekKayitSayisi      =   5;
$toplamKayitSayisiSorgusu                =   $baglanti->prepare("SELECT * FROM  urunler2");
$toplamKayitSayisiSorgusu->execute();
$toplamKayitSayisi                       =   $toplamKayitSayisiSorgusu->rowCount(); 
$sayfalamayaBaslanacaKayitSayisi         =   ($gelenSayfalama*$sayfaBasinaGosterilecekKayitSayisi)-$sayfaBasinaGosterilecekKayitSayisi;
$bulunanSayfaSayisi                      =   ceil($toplamKayitSayisi/$sayfaBasinaGosterilecekKayitSayisi); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayfalama Uygulaması</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
    <?php
    $urunSorgusu                =    $baglanti->prepare("SELECT * FROM urunler2 ORDER BY id ASC LIMIT $sayfalamayaBaslanacaKayitSayisi, $sayfaBasinaGosterilecekKayitSayisi");
    $urunSorgusu->execute();
    $urunSorgusuKayitSayisi     =    $urunSorgusu->rowCount();
    $urunSorgusuKayitlari       =    $urunSorgusu->fetchAll(PDO::FETCH_ASSOC);
    foreach($urunSorgusuKayitlari as $kayitlar){
        echo "<tr>";
        echo "<td>" . $kayitlar["id"] . "</td>";
        echo "<td>" . $kayitlar["urunadi"] . "</td>";
        echo "<td>" . $kayitlar["urunfiyati"] . " " . $kayitlar["parabirimi"] . "</td>";
        echo "</tr>";
    }
    ?>  
    </table>

    <div class="sayfalamaAlaniKapsayicisi">
        <div class="sayfalamaAlaniIcinMetinAlaniKapsayicisi">
            Toplam <?php  echo $bulunanSayfaSayisi; ?> sayfada, <?php  echo $toplamKayitSayisi; ?> adet kayıt bulunmaktadır.
        </div>

        <div class="sayfalamaAlaniIcinNumaralandırmaAlaniKapsayicisi">
            <?php
                if($gelenSayfalama>1){
                    echo "<span class='Pasif'><a href='index.php?Sayfalama=1'> << </a></span>";
                    $sayfalamaIcinSayfaDegeriniBirGeriAl    =   $gelenSayfalama-1;
                    echo "<span class='Pasif'><a href='index.php?Sayfalama=" . $sayfalamaIcinSayfaDegeriniBirGeriAl . "'> < </a></span>";
                }
                for($sayfalamaIcinSayfaIndexDegeri=$gelenSayfalama-$sayfalamaIcinSolveSagButonSayisi; $sayfalamaIcinSayfaIndexDegeri<=$gelenSayfalama+$sayfalamaIcinSolveSagButonSayisi;
                $sayfalamaIcinSayfaIndexDegeri++){
                    if(($sayfalamaIcinSayfaIndexDegeri>0) and ($sayfalamaIcinSayfaIndexDegeri<=$bulunanSayfaSayisi)){
                        if($gelenSayfalama==$sayfalamaIcinSayfaIndexDegeri){
                            echo " <span class='Aktif'>" . $sayfalamaIcinSayfaIndexDegeri . "</span>";
                        }else{
                            echo "<span class='Pasif'><a href='index.php?Sayfalama=" . $sayfalamaIcinSayfaIndexDegeri . "'> " . $sayfalamaIcinSayfaIndexDegeri . "</a></span>";
                        }
                    }
                }
                if($gelenSayfalama!=$bulunanSayfaSayisi){
                    $sayfalamaIcinSayfaDegeriniBirIleriAl  = $gelenSayfalama+1;
                    echo "<span class='Pasif'><a href='index.php?Sayfalama=" . $sayfalamaIcinSayfaDegeriniBirIleriAl . "'> > </a></span>";
                    echo "<span class='Pasif'><a href='index.php?Sayfalama=" . $bulunanSayfaSayisi . "'> >> </a></span>";
                }
            ?>
        </div>
    </div>
    
</body>
</html>

<?php
$baglanti = null;
?>
