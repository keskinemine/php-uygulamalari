<?php
header("Content-Type:text/html; charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'iletişimFormuUygulamasi/PHPMailer/src/Exception.php';
require 'iletişimFormuUygulamasi/PHPMailer/src/PHPMailer.php';
require 'iletişimFormuUygulamasi/PHPMailer/src/SMTP.php';

function Filtrele($Deger){
    $IslemBir   =   trim($Deger);
    $IslemIki   =   strip_tags($IslemBir);
    $IslemUc    =   htmlspecialchars($IslemIki, ENT_QUOTES);
    $Sonuc      =   $IslemUc;
        return $Sonuc;
}

$GelenIsimSoyisim       =   Filtrele($_POST["adisoyadi"]);
$GelenTelefon           =   Filtrele($_POST["telefon"]);
$GelenEmailAdresi       =   Filtrele($_POST["emailadresi"]);
$GelenKonu              =   Filtrele($_POST["konusu"]);
$GelenMesaj             =   Filtrele($_POST["mesaj"]);



$MailGonder           =   new PHPMailer(true);

try {
    //Sunucu Ayarları
    $MailGonder->SMTPDebug = 0;                             //Debug çıktısı (0 Kapalı 2 Detaylı)
    $MailGonder->isSMTP();                                  //Send using SMTP
    $MailGonder->Host           = 'mail.redpen.site';       //Set the SMTP server to send through
    $MailGonder->SMTPAuth       = true;                     //Enable SMTP authentication
    $MailGonder->Username       = 'info@redpen.site';       //SMTP username
    $MailGonder->Password       = '123456';                 //SMTP password
    $MailGonder->SMTPSecure     = 'tls';                    //Enable implicit TLS encryption
    $MailGonder->Port           = 587;                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $MailGonder->SMTPOptions    = array(
                                    'ssl' => [
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    ],
                                );


    //Recipients
    $MailGonder->setFrom($GelenEmailAdresi, $GelenIsimSoyisim);
    $MailGonder->addAddress('info@redpen.site', 'Emine Keskin');     //Add a recipient
    $MailGonder->addReplyTo($GelenEmailAdresi, $GelenIsimSoyisim);


    //Content
    $MailGonder->isHTML(true);                                  //Set email format to HTML
    $MailGonder->Subject = $GelenKonu;
    $MailGonder->MsgHTML($GelenMesaj);
    
    
    //$MailGonder->Body    = 'Mail içeriği <b>in bold!</b>';
    //$MailGonder->AltBody = 'Mail içeriği <b>in bold!</b> (HTML mail kabul etmeyen sunucular için)';

    $MailGonder->send();
    echo 'Mesaj gönderildi';

} catch (Exception $e) {
    echo "Mail gönderim hatası <br/> Hata Açıklması: "; $MailGonder->ErrorInfo;

}







?>