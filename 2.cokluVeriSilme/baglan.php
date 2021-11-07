<?php
try{
    $baglanti = new PDO ("mysql:host=localhost;dbname=veriSilme; charset=UTF8", "root", "");
}catch(PDOException $e){
    echo "Hata<br>"  . $e->getMessage();
    die();
}
?>