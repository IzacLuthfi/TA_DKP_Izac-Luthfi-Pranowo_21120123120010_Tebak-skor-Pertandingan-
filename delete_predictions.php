<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = 'predictions.json';
    if (file_exists($filename)) {
        file_put_contents($filename, json_encode([], JSON_PRETTY_PRINT));
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
