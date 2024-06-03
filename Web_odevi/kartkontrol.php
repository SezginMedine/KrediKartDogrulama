<?php
function kartTipi($number) {
    $cardType = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
        "diners"     => "/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/",
        "enroute"    => "/^2(?:014|149)[0-9]{11}$/",
        "jcb"        => "/^(?:2131|1800|35\d{3})\d{11}$/",
        "troy"       => "/^(?:9792|65\d{2}|36|2205)\d{12}$/",
    );
    foreach ($cardType as $key => $value) {
        if (preg_match($value, $number)) {
            return $key;
        }
    }
    return "Hatalı";
}

function isValidCard($number) {
    $sum = 0;
    $alternate = false;
    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $n = (int) $number[$i];
        if ($alternate) {
            $n *= 2;
            if ($n > 9) {
                $n = ($n % 10) + 1;
            }
        }
        $sum += $n;
        $alternate = !$alternate;
    }
    return ($sum % 10 == 0);
}

$cardNo = $_POST['cardNumber']; // Kart numarası gelmezse boş dönecek
if ($cardNo) {
    // Boşlukları ve sayısal olmayan karakterleri kaldır
    $cardNo = preg_replace('/\D/', '', $cardNo);//$cardNo = preg_replace('/\s+/', '', $cardNo);//preg_replace sayesinde 
    //kart arasındaki boşlukları ve +,- kısıtlamasında yapıldı.

    // Kart tipini belirle
    $cardType = kartTipi($cardNo);

    // Kart numarasını doğrula
    $isValid = isValidCard($cardNo);    
} else {
    $cardType = "Bilinmiyor"; // Bilinmiyor
    $isValid = "Başarısız"; // Başarısız
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kart Kontrol</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div id="result" class="result">
            <p>Kart Tipi: <?php echo $cardType; ?></p><br>
            <p>Doğrulama: <?php echo ($isValid) ? "Başarılı" : "Başarısız"; ?></p><br>
        </div>
        <a href="index.php">Geri Git</a>
    </div>  
</body>
</html>
