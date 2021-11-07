<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Deneme</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="sonuc.php" method="POST">
        <table>
            <tr>
                <td style="width: 150px; height:30px">Adınız Soyadınız</td>
                <td> : </td>
                <td><input type="text" class="inputAlani" name="adisoyadi"></td>
            </tr>
            <tr>
                <td style="width: 150px; height:30px">Telefon Numaranız</td>
                <td> : </td>
                <td> <input type="number" class="inputAlani" name="telefon"></td>
            </tr>
            <tr>
                <td style="width: 150px; height:30px">E-mail Adresiniz</td>
                <td> : </td>
                <td> <input type="email" class="inputAlani" name="emailadresi"></td>
            </tr>
            <tr>
                <td style="width: 150px; height:30px">Konu </td>
                <td> : </td>
                <td> <input type="text" class="inputAlani" name="konusu"></td>
            </tr>
            <tr>
                <td style="width: 150px; height:30px" valign="top">Mesaj </td>
                <td valign="top"> : </td>
                <td> <textarea class="textArea" name="mesaj"></textarea></td>
            </tr>
            <tr>
                <td style="width: 150px; height:30px">&nbsp </td>
                <td>&nbsp </td>
                <td> <input type="submit" class="gonderButonu" value="Gönder"></td>
            </tr>
        </table>
    
    
    
    
    
    </form>
</body>
</html>