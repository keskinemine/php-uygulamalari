<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCMB Döviz Kurları</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

    try{
        $baglanti   =   new PDO("mysql:host=localhost;dbname=veriSilme;charset=UTF8", "root", "");
    }catch(PDOException $e){
        echo "Bağlantı Hatası<br>" . $e->getMessage();
        die();
    }

    //sleep(5);s
    $zamanDamgasi       =  time();

    $link       = "https://www.tcmb.gov.tr/kurlar/today.xml";
    $icerik     =  simplexml_load_file($link);

    $USD_Birim          =  $icerik->Currency[0]->Unit;
    $USD_Adi            =  $icerik->Currency[0]->Isim;
    $USD_KisaAdi        =  $icerik->Currency[0]["CurrencyCode"];
    $USD_Alis           =  $icerik->Currency[0]->ForexBuying;
    $USD_Satis          =  $icerik->Currency[0]->ForexSelling;
    $USD_EfektifAlis    =  $icerik->Currency[0]->BanknoteBuying;
    $USD_EfektifSatis   =  $icerik->Currency[0]->BanknoteSelling;

    $USDGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $USDGuncelle->execute([$USD_Adi, $USD_Birim, $USD_Alis, $USD_Satis, $USD_EfektifAlis, $USD_EfektifSatis, $zamanDamgasi, $USD_KisaAdi]);
    $USDEtkilenenSayi   =  $USDGuncelle->rowCount();
        if($USDEtkilenenSayi<1){
            echo $USD_Adi . " güncelleme işleminde hata oluştu";
            die();
        }
    
    $AUD_Birim          =  $icerik->Currency[1]->Unit;
    $AUD_Adi            =  $icerik->Currency[1]->Isim;
    $AUD_KisaAdi        =  $icerik->Currency[1]["CurrencyCode"];
    $AUD_Alis           =  $icerik->Currency[1]->ForexBuying;
    $AUD_Satis          =  $icerik->Currency[1]->ForexSelling;
    $AUD_EfektifAlis    =  $icerik->Currency[1]->BanknoteBuying;
    $AUD_EfektifSatis   =  $icerik->Currency[1]->BanknoteSelling;

    
    $AUDGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $AUDGuncelle->execute([$AUD_Adi, $AUD_Birim, $AUD_Alis, $AUD_Satis, $AUD_EfektifAlis, $AUD_EfektifSatis, $zamanDamgasi, $AUD_KisaAdi]);
    $AUDEtkilenenSayi   =  $AUDGuncelle->rowCount();
        if($AUDEtkilenenSayi<1){
            echo $AUD_Adi . " güncelleme işleminde hata oluştu";
            die();
        }
    
    $DKK_Birim          =  $icerik->Currency[2]->Unit;
    $DKK_Adi            =  $icerik->Currency[2]->Isim;
    $DKK_KisaAdi        =  $icerik->Currency[2]["CurrencyCode"];
    $DKK_Alis           =  $icerik->Currency[2]->ForexBuying;
    $DKK_Satis          =  $icerik->Currency[2]->ForexSelling;
    $DKK_EfektifAlis    =  $icerik->Currency[2]->BanknoteBuying;
    $DKK_EfektifSatis   =  $icerik->Currency[2]->BanknoteSelling;

    $DKKGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $DKKGuncelle->execute([$DKK_Adi, $DKK_Birim, $DKK_Alis, $DKK_Satis, $DKK_EfektifAlis, $DKK_EfektifSatis, $zamanDamgasi, $DKK_KisaAdi]);
    $DKKEtkilenenSayi   =  $DKKGuncelle->rowCount();
        if($DKKEtkilenenSayi<1){
            echo $DKK_Adi . " güncelleme işleminde hata oluştu";
            die();
        }

    $EUR_Birim          =  $icerik->Currency[3]->Unit;
    $EUR_Adi            =  $icerik->Currency[3]->Isim;
    $EUR_KisaAdi        =  $icerik->Currency[3]["CurrencyCode"];
    $EUR_Alis           =  $icerik->Currency[3]->ForexBuying;
    $EUR_Satis          =  $icerik->Currency[3]->ForexSelling;
    $EUR_EfektifAlis    =  $icerik->Currency[3]->BanknoteBuying;
    $EUR_EfektifSatis   =  $icerik->Currency[3]->BanknoteSelling;

     $EURGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $EURGuncelle->execute([$EUR_Adi, $EUR_Birim, $EUR_Alis, $EUR_Satis, $EUR_EfektifAlis, $EUR_EfektifSatis, $zamanDamgasi, $EUR_KisaAdi]);
    $EUREtkilenenSayi   =  $EURGuncelle->rowCount();
        if($EUREtkilenenSayi<1){
            echo $EUR_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
    
    $GBP_Birim          =  $icerik->Currency[4]->Unit;
    $GBP_Adi            =  $icerik->Currency[4]->Isim;
    $GBP_KisaAdi        =  $icerik->Currency[4]["CurrencyCode"];
    $GBP_Alis           =  $icerik->Currency[4]->ForexBuying;
    $GBP_Satis          =  $icerik->Currency[4]->ForexSelling;
    $GBP_EfektifAlis    =  $icerik->Currency[4]->BanknoteBuying;
    $GBP_EfektifSatis   =  $icerik->Currency[4]->BanknoteSelling;

    $GBPGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $GBPGuncelle->execute([$GBP_Adi, $GBP_Birim, $GBP_Alis, $GBP_Satis, $GBP_EfektifAlis, $GBP_EfektifSatis, $zamanDamgasi, $GBP_KisaAdi]);
    $GBPEtkilenenSayi   =  $GBPGuncelle->rowCount();
        if($GBPEtkilenenSayi<1){
            echo $GBP_Adi . "güncelleme işleminde hata oluştu";
            die();
        }


    $CHF_Birim          =  $icerik->Currency[5]->Unit;
    $CHF_Adi            =  $icerik->Currency[5]->Isim;
    $CHF_KisaAdi        =  $icerik->Currency[5]["CurrencyCode"];
    $CHF_Alis           =  $icerik->Currency[5]->ForexBuying;
    $CHF_Satis          =  $icerik->Currency[5]->ForexSelling;
    $CHF_EfektifAlis    =  $icerik->Currency[5]->BanknoteBuying;
    $CHF_EfektifSatis   =  $icerik->Currency[5]->BanknoteSelling;

    $CHFGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $CHFGuncelle->execute([$CHF_Adi, $CHF_Birim, $CHF_Alis, $CHF_Satis, $CHF_EfektifAlis, $CHF_EfektifSatis, $zamanDamgasi, $CHF_KisaAdi]);
    $CHFEtkilenenSayi   =  $CHFGuncelle->rowCount();
        if($CHFEtkilenenSayi<1){
            echo $CHF_Adi . "güncelleme işleminde hata oluştu";
            die();
        }

    $SEK_Birim          =  $icerik->Currency[6]->Unit;
    $SEK_Adi            =  $icerik->Currency[6]->Isim;
    $SEK_KisaAdi        =  $icerik->Currency[6]["CurrencyCode"];
    $SEK_Alis           =  $icerik->Currency[6]->ForexBuying;
    $SEK_Satis          =  $icerik->Currency[6]->ForexSelling;
    $SEK_EfektifAlis    =  $icerik->Currency[6]->BanknoteBuying;
    $SEK_EfektifSatis   =  $icerik->Currency[6]->BanknoteSelling;

    $SEKGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $SEKGuncelle->execute([$SEK_Adi, $SEK_Birim, $SEK_Alis, $SEK_Satis, $SEK_EfektifAlis, $SEK_EfektifSatis, $zamanDamgasi, $SEK_KisaAdi]);
    $SEKEtkilenenSayi   =  $SEKGuncelle->rowCount();
        if($SEKEtkilenenSayi<1){
            echo $SEK_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
      
    $CAD_Birim          =  $icerik->Currency[7]->Unit;
    $CAD_Adi            =  $icerik->Currency[7]->Isim;
    $CAD_KisaAdi        =  $icerik->Currency[7]["CurrencyCode"];
    $CAD_Alis           =  $icerik->Currency[7]->ForexBuying;
    $CAD_Satis          =  $icerik->Currency[7]->ForexSelling;
    $CAD_EfektifAlis    =  $icerik->Currency[7]->BanknoteBuying;
    $CAD_EfektifSatis   =  $icerik->Currency[7]->BanknoteSelling;

    $CADGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $CADGuncelle->execute([$CAD_Adi, $CAD_Birim, $CAD_Alis, $CAD_Satis, $CAD_EfektifAlis, $CAD_EfektifSatis, $zamanDamgasi, $CAD_KisaAdi]);
    $CADEtkilenenSayi   =  $CADGuncelle->rowCount();
        if($CADEtkilenenSayi<1){
            echo $CAD_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
       
    $KWD_Birim          =  $icerik->Currency[8]->Unit;
    $KWD_Adi            =  $icerik->Currency[8]->Isim;
    $KWD_KisaAdi        =  $icerik->Currency[8]["CurrencyCode"];
    $KWD_Alis           =  $icerik->Currency[8]->ForexBuying;
    $KWD_Satis          =  $icerik->Currency[8]->ForexSelling;
    $KWD_EfektifAlis    =  $icerik->Currency[8]->BanknoteBuying;
    $KWD_EfektifSatis   =  $icerik->Currency[8]->BanknoteSelling;

    $KWDGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $KWDGuncelle->execute([$KWD_Adi, $KWD_Birim, $KWD_Alis, $KWD_Satis, $KWD_EfektifAlis, $KWD_EfektifSatis, $zamanDamgasi, $KWD_KisaAdi]);
    $KWDEtkilenenSayi   =  $KWDGuncelle->rowCount();
        if($KWDEtkilenenSayi<1){
            echo $KWD_Adi . " güncelleme işleminde hata oluştu";
            die();
        }
       

    $NOK_Birim          =  $icerik->Currency[9]->Unit;
    $NOK_Adi            =  $icerik->Currency[9]->Isim;
    $NOK_KisaAdi        =  $icerik->Currency[9]["CurrencyCode"];
    $NOK_Alis           =  $icerik->Currency[9]->ForexBuying;
    $NOK_Satis          =  $icerik->Currency[9]->ForexSelling;
    $NOK_EfektifAlis    =  $icerik->Currency[9]->BanknoteBuying;
    $NOK_EfektifSatis   =  $icerik->Currency[9]->BanknoteSelling;

    $NOKGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $NOKGuncelle->execute([$NOK_Adi, $NOK_Birim, $NOK_Alis, $NOK_Satis, $NOK_EfektifAlis, $NOK_EfektifSatis, $zamanDamgasi, $NOK_KisaAdi]);
    $NOKEtkilenenSayi   =  $NOKGuncelle->rowCount();
        if($NOKEtkilenenSayi<1){
            echo $NOK_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
       
    $SAR_Birim          =  $icerik->Currency[10]->Unit;
    $SAR_Adi            =  $icerik->Currency[10]->Isim;
    $SAR_KisaAdi        =  $icerik->Currency[10]["CurrencyCode"];
    $SAR_Alis           =  $icerik->Currency[10]->ForexBuying;
    $SAR_Satis          =  $icerik->Currency[10]->ForexSelling;
    $SAR_EfektifAlis    =  $icerik->Currency[10]->BanknoteBuying;
    $SAR_EfektifSatis   =  $icerik->Currency[10]->BanknoteSelling;

    $SARGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $SARGuncelle->execute([$SAR_Adi, $SAR_Birim, $SAR_Alis, $SAR_Satis, $SAR_EfektifAlis, $SAR_EfektifSatis, $zamanDamgasi, $SAR_KisaAdi]);
    $SAREtkilenenSayi   =  $SARGuncelle->rowCount();
        if($SAREtkilenenSayi<1){
            echo $SAR_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
       
    $JPY_Birim          =  $icerik->Currency[11]->Unit;
    $JPY_Adi            =  $icerik->Currency[11]->Isim;
    $JPY_KisaAdi        =  $icerik->Currency[11]["CurrencyCode"];
    $JPY_Alis           =  $icerik->Currency[11]->ForexBuying;
    $JPY_Satis          =  $icerik->Currency[11]->ForexSelling;
    $JPY_EfektifAlis    =  $icerik->Currency[11]->BanknoteBuying;
    $JPY_EfektifSatis   =  $icerik->Currency[11]->BanknoteSelling;

    $JPYGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $JPYGuncelle->execute([$JPY_Adi, $JPY_Birim, $JPY_Alis, $JPY_Satis, $JPY_EfektifAlis, $JPY_EfektifSatis, $zamanDamgasi, $JPY_KisaAdi]);
    $JPYEtkilenenSayi   =  $JPYGuncelle->rowCount();
        if($JPYEtkilenenSayi<1){
            echo $JPY_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
 
      
    $BGN_Birim          =  $icerik->Currency[12]->Unit;
    $BGN_Adi            =  $icerik->Currency[12]->Isim;
    $BGN_KisaAdi        =  $icerik->Currency[12]["CurrencyCode"];
    $BGN_Alis           =  $icerik->Currency[12]->ForexBuying;
    $BGN_Satis          =  $icerik->Currency[12]->ForexSelling;
    

    $BGNGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?,  guncellenmezamani = ? WHERE kodu = ?");
    $BGNGuncelle->execute([$BGN_Adi, $BGN_Birim, $BGN_Alis, $BGN_Satis,  $zamanDamgasi, $BGN_KisaAdi]);
    $BGNEtkilenenSayi   =  $BGNGuncelle->rowCount();
        if($BGNEtkilenenSayi<1){
            echo $BGN_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
      

    $RON_Birim          =  $icerik->Currency[13]->Unit;
    $RON_Adi            =  $icerik->Currency[13]->Isim;
    $RON_KisaAdi        =  $icerik->Currency[13]["CurrencyCode"];
    $RON_Alis           =  $icerik->Currency[13]->ForexBuying;
    $RON_Satis          =  $icerik->Currency[13]->ForexSelling;
    

    $RONGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?,  guncellenmezamani = ? WHERE kodu = ?");
    $RONGuncelle->execute([$RON_Adi, $RON_Birim, $RON_Alis, $RON_Satis, $zamanDamgasi, $RON_KisaAdi]);
    $RONEtkilenenSayi   =  $RONGuncelle->rowCount();
        if($RONEtkilenenSayi<1){
            echo $RON_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
  
    $RUB_Birim          =  $icerik->Currency[14]->Unit;
    $RUB_Adi            =  $icerik->Currency[14]->Isim;
    $RUB_KisaAdi        =  $icerik->Currency[14]["CurrencyCode"];
    $RUB_Alis           =  $icerik->Currency[14]->ForexBuying;
    $RUB_Satis          =  $icerik->Currency[14]->ForexSelling;
    $RUB_EfektifAlis    =  $icerik->Currency[14]->BanknoteBuying[""];
    $RUB_EfektifSatis   =  $icerik->Currency[14]->BanknoteBuying[""];

    $RUBGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $RUBGuncelle->execute([$RUB_Adi, $RUB_Birim, $RUB_Alis, $RUB_Satis, $RUB_EfektifAlis, $RUB_EfektifSatis, $zamanDamgasi, $RUB_KisaAdi]);
    $RUBEtkilenenSayi   =  $RUBGuncelle->rowCount();
        if($RUBEtkilenenSayi<1){
            echo $RUB_Adi . "güncelleme işleminde hata oluştu";
            die();
        }


    $IRR_Birim          =  $icerik->Currency[15]->Unit;
    $IRR_Adi            =  $icerik->Currency[15]->Isim;
    $IRR_KisaAdi        =  $icerik->Currency[15]["CurrencyCode"];
    $IRR_Alis           =  $icerik->Currency[15]->ForexBuying;
    $IRR_Satis          =  $icerik->Currency[15]->ForexSelling;
    
    $IRRGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?, guncellenmezamani = ? WHERE kodu = ?");
    $IRRGuncelle->execute([$IRR_Adi, $IRR_Birim, $IRR_Alis, $IRR_Satis,  $zamanDamgasi, $IRR_KisaAdi]);
    $IRREtkilenenSayi   =  $IRRGuncelle->rowCount();
        if($IRREtkilenenSayi<1){
            echo $IRR_Adi . "güncelleme işleminde hata oluştu";
            die();
        }

    $CNY_Birim          =  $icerik->Currency[16]->Unit;
    $CNY_Adi            =  $icerik->Currency[16]->Isim;
    $CNY_KisaAdi        =  $icerik->Currency[16]["CurrencyCode"];
    $CNY_Alis           =  $icerik->Currency[16]->ForexBuying;
    $CNY_Satis          =  $icerik->Currency[16]->ForexSelling;
    

    $CNYGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?,  guncellenmezamani = ? WHERE kodu = ?");
    $CNYGuncelle->execute([$CNY_Adi, $CNY_Birim, $CNY_Alis, $CNY_Satis,  $zamanDamgasi, $CNY_KisaAdi]);
    $CNYEtkilenenSayi   =  $CNYGuncelle->rowCount();
        if($CNYEtkilenenSayi<1){
            echo $CNY_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
 
    $PKR_Birim          =  $icerik->Currency[17]->Unit;
    $PKR_Adi            =  $icerik->Currency[17]->Isim;
    $PKR_KisaAdi        =  $icerik->Currency[17]["CurrencyCode"];
    $PKR_Alis           =  $icerik->Currency[17]->ForexBuying;
    $PKR_Satis          =  $icerik->Currency[17]->ForexSelling;
    

    $PKRGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?,  guncellenmezamani = ? WHERE kodu = ?");
    $PKRGuncelle->execute([$PKR_Adi, $PKR_Birim, $PKR_Alis, $PKR_Satis,  $zamanDamgasi, $PKR_KisaAdi]);
    $PKREtkilenenSayi   =  $PKRGuncelle->rowCount();
        if($PKREtkilenenSayi<1){
            echo $PKR_Adi . "güncelleme işleminde hata oluştu";
            die();
        }

    
    $QAR_Birim          =  $icerik->Currency[18]->Unit;
    $QAR_Adi            =  $icerik->Currency[18]->Isim;
    $QAR_KisaAdi        =  $icerik->Currency[18]["CurrencyCode"];
    $QAR_Alis           =  $icerik->Currency[18]->ForexBuying;
    $QAR_Satis          =  $icerik->Currency[18]->ForexSelling;

    $QARGuncelle        =  $baglanti->prepare("UPDATE dovizkurlari SET adi = ?, birim = ?, alis = ?, satis = ?,  guncellenmezamani = ? WHERE kodu = ?");
    $QARGuncelle->execute([$QAR_Adi, $QAR_Birim, $QAR_Alis, $QAR_Satis, $zamanDamgasi, $QAR_KisaAdi]);
    $QAREtkilenenSayi   =  $QARGuncelle->rowCount();
        if($QAREtkilenenSayi<1){
            echo $QAR_Adi . "güncelleme işleminde hata oluştu";
            die();
        }
    ?>

    <table>
        <tr>
            <th>Adı</th>
            <th>Kısa Adı</th>
            <th>Birimi</th>
            <th>Alış</th>
            <th>Satış</th>
            <th>Efektif Alış</th>
            <th>Efektif Satış</th>
        </tr>
        <tr>
            <td><?php echo $USD_Adi;  ?></td>
            <td><?php echo $USD_KisaAdi;  ?></td>
            <td><?php echo $USD_Birim; ?></td>
            <td><?php echo $USD_Alis; ?></td>
            <td><?php echo $USD_Satis; ?></td>
            <td><?php echo $USD_EfektifAlis; ?></td>
            <td><?php echo $USD_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $AUD_Adi;  ?></td>
            <td><?php echo $AUD_KisaAdi; ?></td>
            <td><?php echo $AUD_Birim; ?></td>
            <td><?php echo $AUD_Alis; ?></td>
            <td><?php echo $AUD_Satis; ?></td>
            <td><?php echo $AUD_EfektifAlis; ?></td>
            <td><?php echo $AUD_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $DKK_Adi;  ?></td>
            <td><?php echo $DKK_KisaAdi; ?></td>
            <td><?php echo $DKK_Birim; ?></td>
            <td><?php echo $DKK_Alis; ?></td>
            <td><?php echo $DKK_Satis; ?></td>
            <td><?php echo $DKK_EfektifAlis; ?></td>
            <td><?php echo $DKK_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $EUR_Adi;  ?></td>
            <td><?php echo $EUR_KisaAdi; ?></td>
            <td><?php echo $EUR_Birim; ?></td>
            <td><?php echo $EUR_Alis; ?></td>
            <td><?php echo $EUR_Satis; ?></td>
            <td><?php echo $EUR_EfektifAlis; ?></td>
            <td><?php echo $EUR_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $GBP_Adi;  ?></td>
            <td><?php echo $GBP_KisaAdi; ?></td>
            <td><?php echo $GBP_Birim; ?></td>
            <td><?php echo $GBP_Alis; ?></td>
            <td><?php echo $GBP_Satis; ?></td>
            <td><?php echo $GBP_EfektifAlis; ?></td>
            <td><?php echo $GBP_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $CHF_Adi;  ?></td>
            <td><?php echo $CHF_KisaAdi; ?></td>
            <td><?php echo $CHF_Birim; ?></td>
            <td><?php echo $CHF_Alis; ?></td>
            <td><?php echo $CHF_Satis; ?></td>
            <td><?php echo $CHF_EfektifAlis; ?></td>
            <td><?php echo $CHF_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $SEK_Adi;  ?></td>
            <td><?php echo $SEK_KisaAdi; ?></td>
            <td><?php echo $SEK_Birim; ?></td>
            <td><?php echo $SEK_Alis; ?></td>
            <td><?php echo $SEK_Satis; ?></td>
            <td><?php echo $SEK_EfektifAlis; ?></td>
            <td><?php echo $SEK_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $CAD_Adi;  ?></td>
            <td><?php echo $CAD_KisaAdi; ?></td>
            <td><?php echo $CAD_Birim; ?></td>
            <td><?php echo $CAD_Alis; ?></td>
            <td><?php echo $CAD_Satis; ?></td>
            <td><?php echo $CAD_EfektifAlis; ?></td>
            <td><?php echo $CAD_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $KWD_Adi;  ?></td>
            <td><?php echo $KWD_KisaAdi; ?></td>
            <td><?php echo $KWD_Birim; ?></td>
            <td><?php echo $KWD_Alis; ?></td>
            <td><?php echo $KWD_Satis; ?></td>
            <td><?php echo $KWD_EfektifAlis; ?></td>
            <td><?php echo $KWD_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $NOK_Adi;  ?></td>
            <td><?php echo $NOK_KisaAdi; ?></td>
            <td><?php echo $NOK_Birim; ?></td>
            <td><?php echo $NOK_Alis; ?></td>
            <td><?php echo $NOK_Satis; ?></td>
            <td><?php echo $NOK_EfektifAlis; ?></td>
            <td><?php echo $NOK_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $SAR_Adi;  ?></td>
            <td><?php echo $SAR_KisaAdi; ?></td>
            <td><?php echo $SAR_Birim; ?></td>
            <td><?php echo $SAR_Alis; ?></td>
            <td><?php echo $SAR_Satis; ?></td>
            <td><?php echo $SAR_EfektifAlis; ?></td>
            <td><?php echo $SAR_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $JPY_Adi;  ?></td>
            <td><?php echo $JPY_KisaAdi; ?></td>
            <td><?php echo $JPY_Birim; ?></td>
            <td><?php echo $JPY_Alis; ?></td>
            <td><?php echo $JPY_Satis; ?></td>
            <td><?php echo $JPY_EfektifAlis; ?></td>
            <td><?php echo $JPY_EfektifSatis ?></td>
            
        </tr>
        <tr>
            <td><?php echo $BGN_Adi;  ?></td>
            <td><?php echo $BGN_KisaAdi; ?></td>
            <td><?php echo $BGN_Birim; ?></td>
            <td><?php echo $BGN_Alis; ?></td>
            <td><?php echo $BGN_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
        <tr>
            <td><?php echo $RON_Adi;  ?></td>
            <td><?php echo $RON_KisaAdi; ?></td>
            <td><?php echo $RON_Birim; ?></td>
            <td><?php echo $RON_Alis; ?></td>
            <td><?php echo $RON_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
        <tr>
            <td><?php echo $RUB_Adi;  ?></td>
            <td><?php echo $RUB_KisaAdi; ?></td>
            <td><?php echo $RUB_Birim; ?></td>
            <td><?php echo $RUB_Alis; ?></td>
            <td><?php echo $RUB_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
        <tr>
            <td><?php echo $IRR_Adi;  ?></td>
            <td><?php echo $IRR_KisaAdi; ?></td>
            <td><?php echo $IRR_Birim; ?></td>
            <td><?php echo $IRR_Alis; ?></td>
            <td><?php echo $IRR_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
        <tr>
            <td><?php echo $CNY_Adi;  ?></td>
            <td><?php echo $CNY_KisaAdi; ?></td>
            <td><?php echo $CNY_Birim; ?></td>
            <td><?php echo $CNY_Alis; ?></td>
            <td><?php echo $CNY_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
        <tr>
            <td><?php echo $PKR_Adi;  ?></td>
            <td><?php echo $PKR_KisaAdi; ?></td>
            <td><?php echo $PKR_Birim; ?></td>
            <td><?php echo $PKR_Alis; ?></td>
            <td><?php echo $PKR_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
        <tr>
            <td><?php echo $QAR_Adi;  ?></td>
            <td><?php echo $QAR_KisaAdi; ?></td>
            <td><?php echo $QAR_Birim; ?></td>
            <td><?php echo $QAR_Alis; ?></td>
            <td><?php echo $QAR_Satis; ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            
        </tr>
    </table>



    <?php
    /*
    echo "<pre>";
    print_r($icerik)
    */


    ?>
</body>
</html>