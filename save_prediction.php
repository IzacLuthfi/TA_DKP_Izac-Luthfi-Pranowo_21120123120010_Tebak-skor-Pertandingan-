<?php
date_default_timezone_set('Asia/Jakarta'); // Set timezone sesuai kebutuhan

// Membaca data dari form
$instagram = $_POST['instagram'];
$prediksi = $_POST['prediksi'];
$waktu_input = date('Y-m-d H:i:s');

// Membaca prediksi yang sudah ada
$filename = 'predictions.json';
if (file_exists($filename)) {
    $tebakan = json_decode(file_get_contents($filename), true);
    if ($tebakan === null) {
        $tebakan = [];
    }
} else {
    $tebakan = [];
}

// Periksa apakah nama Instagram sudah ada dalam prediksi sebelumnya
$isInstagramExist = false;
foreach ($tebakan as $item) {
    if ($item['instagram'] === $instagram) {
        $isInstagramExist = true;
        break;
    }
}

// Jika nama Instagram sudah ada, beri pesan kesalahan
if ($isInstagramExist) {
    echo "<script>alert('Nama Instagram sudah digunakan untuk prediksi sebelumnya. Silakan gunakan nama Instagram yang berbeda.'); window.location.href='index.php';</script>";
    exit();
}

// Tambahkan prediksi baru ke array prediksi
$tebakan[] = ['instagram' => $instagram, 'prediksi' => $prediksi, 'waktu' => $waktu_input];

// Simpan array prediksi ke file JSON
file_put_contents($filename, json_encode($tebakan));

// Redirect ke halaman utama
header('Location: index.php');
exit();
?>
