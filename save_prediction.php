<?php
date_default_timezone_set('Asia/Jakarta'); // Set timezone sesuai kebutuhan

// Membaca data dari form
$instagram = $_POST['instagram'];
$prediksi = $_POST['prediksi'];
$waktu_input = date('Y-m-d H:i:s');

// Simpan tebakan ke file (bisa diganti dengan database)
$tebakan = json_decode(file_get_contents('predictions.json'), true);
if ($tebakan === null) {
    $tebakan = [];
}
$tebakan[] = ['instagram' => $instagram, 'prediksi' => $prediksi, 'waktu' => $waktu_input];
file_put_contents('predictions.json', json_encode($tebakan));

// Redirect ke halaman utama
header('Location: index.php');
exit();
?>
