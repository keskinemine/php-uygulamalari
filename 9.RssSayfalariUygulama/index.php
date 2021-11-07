<?php

header("Content-Type: text/xmlns");

try{
    $baglanti = new PDO("mysql:host=localhost;dbname=veriSilme;charset=UTF8", "root", "");
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema' version='2.0'>
    <channel>
        <title>Extra Eğitim</title>
        <description>İleri Seviye Eğitim Setleri</description>
        <link>http://www.extraegitim.com</link>
        <language>tr</language>";

$sorgu              =   $baglanti->prepare("SELECT * FROM urunler3");
$sorgu->execute();
$sorguSayisi        =   $sorgu->rowCount();
$sorguKayitlari     =   $sorgu->fetchAll(PDO::FETCH_ASSOC);

if($sorguSayisi>0){
    foreach($sorguKayitlari as $satirlar){
        $urunAdi        =   $satirlar["urunadi"];
        $urunFiyati     =   $satirlar["ufunfiyati"];

        echo "
        <item>
        <title>$urunAdi</title>
        <price>$urunFiyati</price>
        </item>";
    }
}

echo "
    </channel>
</rss>";
$baglanti   = null;
?>