<?php
$url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
?>

<div><img src="qrcode.php"></div>
<p><?php echo $url; ?></p>