<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tebak Skor Pertandingan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('wallpaperflare.com_wallpaper2.jpg');
            background-size: cover; /* Atur ukuran gambar agar sesuai dengan elemen */
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
            background-position: center; /* Mengatur posisi gambar di tengah elemen */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background-color: transparent;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        h1 {
            color: red;
            font-size: 2em;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }
        input[type="text"], input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box;
        }
        button {
            background-color: #8B0000;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #8B0000;
        }
        input[type="submit"] {
            background-color: #8B0000;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #8B0000;
        }
        input[type="submit"]:disabled, button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-size: 1em;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
    </style>
    <script>
        let timer;

        function startTimer() {
            const now = new Date().getTime();
            const oneHour = 60 * 60 * 1000;
            const endTime = now + oneHour;

            localStorage.setItem('endTime', endTime);

            document.getElementById('startButton').disabled = true;
            document.getElementById('instagram').disabled = false;
            document.getElementById('prediksi').disabled = false;
            document.getElementById('submitButton').disabled = false;

            updateTimer();
        }

        function updateTimer() {
            const endTime = parseInt(localStorage.getItem('endTime'), 10);
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance <= 0) {
                disableForm();
                clearInterval(timer);
            } else {
                timer = setInterval(function () {
                    updateTimer();
                }, 1000);
            }
        }

        function disableForm() {
            document.getElementById('instagram').disabled = true;
            document.getElementById('prediksi').disabled = true;
            document.getElementById('submitButton').disabled = true;
            document.getElementById('startButton').disabled = false;
            localStorage.removeItem('endTime');
        }

        window.onload = function () {
            const endTime = localStorage.getItem('endTime');
            if (endTime) {
                updateTimer();
            } else {
                disableForm();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Tebak Skor Pertandingan</h1>
        <button id="startButton" onclick="startTimer()">Mulai Tebak Skor</button>
        <form action="save_prediction.php" method="post">
            <label for="instagram">Nama Instagram:</label>
            <input type="text" id="instagram" name="instagram" required disabled>
            <label for="prediksi">Prediksi Skor (Format: TimA SkorA-SkorB TimB):</label>
            <input type="text" id="prediksi" name="prediksi" required disabled>
            <input type="submit" id="submitButton" value="Submit" disabled>
        </form>
        <a href="input_score.php">Input Skor Hasil Pertandingan</a>
        <a href="list_predictions.php">Lihat Prediksi</a>
    </div>
</body>
</html>
