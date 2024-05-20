<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tebak Skor Pertandingan</title>
</head>
<body>
    <h1>Tebak Skor Pertandingan</h1>
    <form action="save_prediction.php" method="post">
        <label for="instagram">Nama Instagram:</label><br>
        <input type="text" id="instagram" name="instagram" required><br><br>
        <label for="prediksi">Prediksi Skor (Format: TimA SkorA-SkorB TimB):</label><br>
        <input type="text" id="prediksi" name="prediksi" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="input_score.php">Input Skor Hasil Pertandingan</a>
</body>
</html>
