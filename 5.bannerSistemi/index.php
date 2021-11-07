<?php
try{
    $baglanti   =   new PDO("mysql:host=localhost;dbname=veriSilme;charset=UTF8", "root", ""); 
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Uygulama</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

    $reklamSorgusu      =   $baglanti->prepare("SELECT * FROM banner ORDER BY gosterimsayisi ASC LIMIT 1");
    $reklamSorgusu->execute();
    $reklamSayisi       =   $reklamSorgusu->rowCount();
    $reklamKaydi        =   $reklamSorgusu->fetch(PDO::FETCH_ASSOC);


    ?>

        <table>
            <tr>
                <td><img src="bannerDosyasi/<?php echo $reklamKaydi["bannerdosyasi"]; ?>"></td>
            </tr>
        </table>
   
</body>
</html>
<?php
    $reklamGuncelle     =   $baglanti->prepare("UPDATE banner SET gosterimsayisi=gosterimsayisi+1 WHERE id = ? LIMIT 1");
    $reklamGuncelle->execute([$reklamKaydi["id"]]);
    
    $baglanti       =  null; 
?>
