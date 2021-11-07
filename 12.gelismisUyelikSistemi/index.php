<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("baglan.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelişmiş Üyelik Sistemi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="header">ÜST ALAN (HEADER ALANI) (LOGO- BANNER- MENÜLER Vs.)</div>
    <div id="content">
        <div class="kapsayici">
            <div class="anasayfa">Ana Sayfa</div>
            <div class="icerik">İÇERİK ALANI(MAIN)</div>
            <div class="uyelik">

                <?php if(isset($_SESSION["Kullanici"])){?>
                        <div class="yeniuyebaslik">
                            <p>Üyelik Alanı</p>
                        </div>
                            <div class="bilgi">Merhaba <?php echo $uyeninAdiSoyadi; ?></div>
                            <div class="cikis"><p><a href="cikis.php"> Çıkış Yap </a></p></div> 
                <?php }else{  ?>
                    <form action="uyegiris.php" method="POST">
                        <div class="uyelikbaslik">
                            <p>Üyelik Alanı</p>
                        </div>
                            <div class="bilgi">Kullanıcı Adı : <input type="text" name="kullaniciadi"></div>
                            <div class="bilgi">Şifre : <input type="password" name="sifre"></div> 
                            <div class="gonderbuton"> <input type="submit" value="Gönder"></div>
                            <div class="yeniuye"><p> <a href="uyeol.php">Yeni Üye Ol</a></p></div>  
                    </form>       
                <?php } ?>   
                </div> 
        </div>
    </div>
    <div id="footer">ALT ALAN (FOOTER ALANI) (LOGO - BANNER- MENÜLER Vs.)</div>
</body>
</html>

<?php

$baglanti = null;

?>