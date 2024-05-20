<?php
// Fungsi untuk memeriksa prediksi yang benar
function cekPrediksiBenar($prediksi, $hasilPertandingan) {
    return $prediksi === $hasilPertandingan;
}

// Membaca skor hasil pertandingan dari form
$hasilPertandingan = $_POST['hasil'];

// Membaca semua tebakan dari file
$tebakan = json_decode(file_get_contents('predictions.json'), true);

// Cek tebakan dan temukan pemenang dengan waktu input tercepat
$pemenang = null;
$waktu_tercepat = null;

foreach ($tebakan as $t) {
    if (cekPrediksiBenar($t['prediksi'], $hasilPertandingan)) {
        if ($pemenang === null || $t['waktu'] < $waktu_tercepat) {
            $pemenang = $t['instagram'];
            $waktu_tercepat = $t['waktu'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tebak Skor</title>
</head>
<body>
    <h1>Hasil Tebak Skor</h1>
    <?php if ($pemenang): ?>
        <p>Selamat kepada <strong><?php echo htmlspecialchars($pemenang); ?></strong>, Anda memenangkan pertandingan!</p>
        <p>Waktu Input: <?php echo htmlspecialchars($waktu_tercepat); ?></p>
    <?php else: ?>
        <p>Maaf, tidak ada yang menebak skor dengan benar. Coba lagi!</p>
    <?php endif; ?>
    <br>
    <a href="index.php">Kembali ke Form Prediksi</a>
</body>
</html>
