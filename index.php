<?php
$identification = $_POST['covid19reg'] ?? $_GET['covid19reg'] ?? $_COOKIE['covid19reg'] ?? false;
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
    $html = file_get_contents('register.html');
}
$config = json_decode(file_get_contents('config.json'), true);
$config = array_merge($config, json_decode(file_get_contents('languages/' . $config['{{language}}'] . '.json'), true));
$config['{{identification}}'] = $identification;
echo str_replace(array_keys($config), array_values($config), $html);
