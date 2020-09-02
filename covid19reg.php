<html>
<head><title>COVID19 registration</title></head>
<body>
<h1>COVID19 registration</h1>
<?php
$identification = $_COOKIE['covid19reg'] ?? $_POST['covid19reg'] ?? false;
if ($_SERVER["REQUEST_METHOD"] == 'POST'):
    $day = date('d');
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $file = file_get_contents("$day.log");
    if (substr($file, 0, 10) != $date) {
        file_put_contents("$day.log", "$date\n");
    }
    file_put_contents("$day.log", "$time $identification\n", FILE_APPEND);
    setcookie('covid19reg', $identification, time() + 24 * 3600 * 365);
    ?>
    <form>
    <p>You have been registered as: "<?php echo htmlspecialchars($identification, ENT_QUOTES, 'UTF-8'); ?>".</p>
    <input type="submit" value="Ok">
    </form>
    <?php
else: ?>
    <form method="post">
    <p>Enter a phone number or email address, so that we can contact you.</p>
    <input name="covid19reg" value="<?php echo htmlspecialchars($identification, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="Register">
    </form>
    <?php
endif;
?>
</html>