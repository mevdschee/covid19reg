<?php
// texts
$texts = [
    'title' => 'COVID19 registration',
    'registered' => 'You have been registered as: "%s".',
    'label' => 'Phone number / email address',
    'next' => 'Next',
    'register' => 'Register',
];
// code
echo "<html><head><title>$texts[title]</title></head>";
echo "<body><h1>$texts[title]</h1>";
$identification = $_COOKIE['covid19reg'] ?? $_POST['covid19reg'] ?? false;
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $day = date('d');
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $file = file_get_contents("$day.php");
    if (substr($file, 17, 10) != $date) {
        file_put_contents("$day.php", "<?php exit(); // $date\n");
    }
    file_put_contents("$day.php", "// $time $identification\n", FILE_APPEND);
    setcookie('covid19reg', $identification, time() + 24 * 3600 * 365);
    echo '<form>';
    echo '<p>' . sprintf($texts['registered'], htmlspecialchars($identification, ENT_QUOTES, 'UTF-8')) . '</p>';
    echo '<input type="submit" value="' . $texts['next'] . '">';
    echo '</form>';
} else {
    echo '<form method="post">';
    echo '<label for="covid19reg">' . $texts['label'] . '</label><br/>';
    echo '<input id="covid19reg" name="covid19reg" value="' . htmlspecialchars($identification, ENT_QUOTES, 'UTF-8') . '"> ';
    echo '<input type="submit" value="' . $texts['register'] . '">';
    echo '</form>';
}
echo '</body></html>';
