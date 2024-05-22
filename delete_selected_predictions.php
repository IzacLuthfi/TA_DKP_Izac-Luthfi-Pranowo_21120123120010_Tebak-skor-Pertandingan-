<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = 'predictions.json';
    if (file_exists($filename)) {
        $tebakan = json_decode(file_get_contents($filename), true);
        if ($tebakan !== null && isset($_POST['selected_predictions'])) {
            foreach ($_POST['selected_predictions'] as $index) {
                unset($tebakan[$index]);
            }
            $tebakan = array_values($tebakan); // Re-index the array
            file_put_contents($filename, json_encode($tebakan, JSON_PRETTY_PRINT));
        }
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
