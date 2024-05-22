<?php

class MatchResult {
    public $teamA;
    public $teamB;
    public $scoreA;
    public $scoreB;

    // Constructor
    public function __construct($teamA, $teamB, $scoreA, $scoreB) {
        $this->teamA = $teamA;
        $this->teamB = $teamB;
        $this->scoreA = $scoreA;
        $this->scoreB = $scoreB;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Skor Hasil Pertandingan</title>
    <link rel="stylesheet" href="css/stylesinput.css">
</head>
<body>
    <div class="container">
        <h1>Input Skor Hasil Pertandingan</h1>
        <form action="find_winner.php" method="post">
            <label for="hasil">Hasil Pertandingan (Format: TimA-TimB SkorA-SkorB):</label><br>
            <input type="text" id="hasil" name="hasil" required><br><br>
            <input type="submit" value="Submit">
        </form>
        <br>
        <a href="index.php">Kembali ke Form Prediksi</a>
    </div>
</body>
</html>
