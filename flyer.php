<?php
$url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url = str_replace('flyer.php', '', $url);
?>

<div><img src="qrcode.php"></div>
<p><?php echo $url; ?></p>