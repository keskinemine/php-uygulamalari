<?php

session_start();

if(empty($_SESSION["SiteDili"])){
    include("diltr.php");
}else{
    if($_SESSION["SiteDili"] == "Turkish"){
        include("diltr.php");
    }elseif($_SESSION["SiteDili"] == "English"){
        include("dilen.php");
    }elseif($_SESSION["SiteDili"] == "French"){
        include("dilfr.php");
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çoklu Dil Uygulaması</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><?php echo ANASAYFA; ?></li>
            <li><?php echo HAKKIMIZDA; ?></li>
            <li><?php echo ILETISIM; ?></li>
            <li><?php echo URUNLER; ?></li>
            <li><a href="secim.php?DilSecimi=Turkish">TR</a> | <a href="secim.php?DilSecimi=English">EN</a> | <a href="secim.php?DilSecimi=French">FR</a></li>
        </ul>
    </div>
</body>
</html>