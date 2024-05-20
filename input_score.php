<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Skor Hasil Pertandingan</title>
</head>
<body>
    <h1>Input Skor Hasil Pertandingan</h1>
    <form action="find_winner.php" method="post">
        <label for="hasil">Hasil Pertandingan (Format: TimA-TimB SkorA-SkorB):</label><br>
        <input type="text" id="hasil" name="hasil" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="index.php">Kembali ke Form Prediksi</a>
</body>
</html>
