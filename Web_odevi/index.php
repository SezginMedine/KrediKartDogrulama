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
        <h2>Kart Kontrol</h2>
        <form id="cardForm" method="POST" action="kartkontrol.php">
            <label for="cardNumber">Kart Numarası:</label><br>
            <input maxlength="16" pattern="\d{13,19}" type="text" id="cardNumber" name="cardNumber" required><br><br>
    <!--  <input maxlength="20" type="number" id="cardNumber" name="cardNumber"><br><br> -->

            <button type="submit">Kontrol Et</button>
        </form>
        <div id="result" class="result"></div>
    </div>
</body>
</html>
