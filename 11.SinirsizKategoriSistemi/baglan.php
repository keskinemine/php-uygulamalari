<?php
try{
    $baglanti = new PDO("mysql:host=localhost;dbname=sinirsizkategori;charset=UTF8", "root", "");
}catch(PDOException $e){
    echo "HATA<br>" . $e->getMessage();
    die();
}

?>