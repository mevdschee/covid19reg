<?php
$identification = $_COOKIE['covid19reg'] ?? $_POST['covid19reg'] ?? false;
$day = date('d');
$date = date('Y-m-d');
$time = date('H:i:s');
$file = file_get_contents("logs/$day.php");
if (substr($file, 17, 10) != $date) {
    file_put_contents("logs/$day.php", "<?php exit(); // $date\n");
}
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    file_put_contents("logs/$day.php", "// $time $identification\n", FILE_APPEND);
    setcookie('covid19reg', $identification, time() + 24 * 3600 * 365);
    $html = file_get_contents('success.html');
} else {
    $html = file_get_contents('index.html');
}
$texts = json_decode(file_get_contents('texts.json'), true);
$texts['{{identification}}'] = $identification;
echo str_replace(array_keys($texts), array_values($texts), $html);
