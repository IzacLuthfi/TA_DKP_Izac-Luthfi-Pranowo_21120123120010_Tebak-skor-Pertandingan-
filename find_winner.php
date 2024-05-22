<?php
class Stack {
    private $stack;

    public function __construct() {
        $this->stack = [];
    }

    public function push($item) {
        array_push($this->stack, $item);
    }

    public function pop() {
        return array_pop($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

class Queue {
    private $queue;

    public function __construct() {
        $this->queue = [];
    }

    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    public function dequeue() {
        return array_shift($this->queue);
    }

    public function isEmpty() {
        return empty($this->queue);
    }
}

// Fungsi untuk memeriksa prediksi yang benar
function cekPrediksiBenar($prediksi, $hasilPertandingan) {
    return $prediksi === $hasilPertandingan;
}

// Membaca skor hasil pertandingan dari form
$hasilPertandingan = $_POST['hasil'];

// Membaca semua tebakan dari file
$tebakan = json_decode(file_get_contents('predictions.json'), true);

// Inisialisasi stack dan queue
$stack = new Stack();
$queue = new Queue();

// ...
$pemenang = null;
$waktu_tercepat = null;

// Menggunakan for loop
$total_tebakan = count($tebakan);
for ($i = 0; $i < $total_tebakan; $i++) {
    $t = $tebakan[$i];
    if (cekPrediksiBenar($t['prediksi'], $hasilPertandingan)) {
        if ($pemenang === null || $t['waktu'] < $waktu_tercepat) {
            $pemenang = $t['instagram'];
            $waktu_tercepat = $t['waktu'];
        }
    }
    // Push semua tebakan ke stack dan queue
    $stack->push($t);
    $queue->enqueue($t);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tebak Skor</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Tebak Skor</h1>
        <?php if ($pemenang): ?>
            <p>Selamat kepada <strong><?php echo htmlspecialchars($pemenang); ?></strong>, Anda memenangkan pertandingan!</p>
            <p>Waktu Input: <?php echo htmlspecialchars($waktu_tercepat); ?></p>
        <?php else: ?>
            <p>Maaf, tidak ada yang menebak skor dengan benar. Coba lagi!</p>
        <?php endif; ?>
        <br>
        <a href="index.php">Kembali ke Form Prediksi</a>
    </div>
</body>
</html>
