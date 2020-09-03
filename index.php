<?php
$identification = $_POST['covid19reg'] ?? $_GET['covid19reg'] ?? $_COOKIE['covid19reg'] ?? false;
$day = date('d');
$date = date('Y-m-d');
$time = date('H:i:s');
$file = file_get_contents("logs/$day.php");
$url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'])[0];
if (substr($file, 17, 10) != $date) {
    file_put_contents("logs/$day.php", "<?php exit(); // $date\n");
}
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    file_put_contents("logs/$day.php", "// $time $identification\n", FILE_APPEND);
    setcookie('covid19reg', $identification, time() + 24 * 3600 * 365);
    $html = file_get_contents('lib/success.html');
} elseif (isset($_GET['flyer'])) {
    $html = file_get_contents('lib/flyer.html');
} elseif (isset($_GET['image'])) {
    include 'lib/image.php';
    die();
} else {
    $html = file_get_contents('lib/register.html');
}
$config = json_decode(file_get_contents('config.json'), true);
$config = array_merge($config, json_decode(file_get_contents('languages/' . $config['{{language}}'] . '.json'), true));
$config['{{url}}'] = $url;
$config['{{identification}}'] = $identification;
echo str_replace(array_keys($config), array_values($config), $html);
