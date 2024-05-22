<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Prediksi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('wallpaperflare.com_wallpaper2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: auto;
            box-sizing: border-box;
        }
        h1 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .delete-button, .reset-button, .delete-selected-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .delete-button:hover, .reset-button:hover, .delete-selected-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Prediksi</h1>
        <form id="delete-form" action="delete_selected_predictions.php" method="post">
            <table>
                <tr>
                    <th>Pilih</th>
                    <th>Nama Instagram</th>
                    <th>Prediksi</th>
                    <th>Waktu</th>
                </tr>
                <?php
                // Membaca data dari file JSON
                $filename = 'predictions.json';
                if (file_exists($filename)) {
                    $tebakan = json_decode(file_get_contents($filename), true);
                    if ($tebakan !== null) {
                        foreach ($tebakan as $index => $item) {
                            echo "<tr>
                                    <td><input type='checkbox' name='selected_predictions[]' value='$index'></td>
                                    <td>" . htmlspecialchars($item['instagram']) . "</td>
                                    <td>" . htmlspecialchars($item['prediksi']) . "</td>
                                    <td>" . htmlspecialchars($item['waktu']) . "</td>
                                    </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Belum ada prediksi</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Belum ada prediksi</td></tr>";
                }
                ?>
            </table>
            <div class="button-container">
                <button type="submit" class="delete-selected-button" onclick="return confirm('Anda yakin ingin menghapus prediksi yang dipilih?');">Hapus </button>
            </div>
        </form>
        <div class="button-container">
            <form action="delete_predictions.php" method="post">
                <button type="submit" class="reset-button" onclick="return confirm('Anda yakin ingin menghapus semua prediksi?');">Reset </button>
            </form>
        </div>
    </div>
</body>
</html>
