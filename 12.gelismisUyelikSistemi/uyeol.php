<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("baglan.php");

if(isset($_SESSION["Kullanici"])){
    header("Location:index.php");
    exit();
}else{
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
                    <form action="uyeolsonuc.php" method="POST">
                        <div class="uyelikbaslik">
                            <p>Yeni Üye Alanı</p>
                        </div>
                            <div class="bilgi">Kullanıcı Adı : <input type="text" name="kullaniciadi"></div>
                            <div class="bilgi">Şifre : <input type="password" name="sifre"></div> 
                            <div class="bilgi">Adı Soyadı : <input type="text" name="adsoyad"></div> 
                            <div class="bilgi">E-mail Adresi : <input type="email" name="emailadresi"></div> 
                            <div class="gonderbuton"> <input type="submit" value="Kayıt Ol"></div>
                    </form>       
            </div> 
        </div>
    </div>
    <div id="footer">ALT ALAN (FOOTER ALANI) (LOGO - BANNER- MENÜLER Vs.)</div>
</body>
</html>

<?php
}

$baglanti = null;

?>