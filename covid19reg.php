<html>
<head><title></title></head>
<body>
<h1>COVID19 registration</h1>
<?php
$identification = $_COOKIE['covid19reg'] ?? $_POST['covid19reg'] ?? false;
if ($identification):
    $date = date('Y-m-d');
    $time = date('H:i:s');
    file_put_contents()
    setcookie('covid19reg', $identification, time() + 24 * 3600 * 365);
    echo '<p>You have been registered as "' . htmlspecialchars($identification, ENT_QUOTES, 'UTF-8') . '".</p>';
else: ?>
    <form method="post">
    <input name="covid19reg" value="<?php echo htmlspecialchars($identification, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="Register">
    </form>
    <?php
endif;
?>
</html>