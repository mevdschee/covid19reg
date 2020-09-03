<?php

include 'qrcode.php';

$qr = QRCode::getMinimumQRCode($url, QR_ERROR_CORRECT_LEVEL_L);

//$qr->printHTML("20px");

//$im = $qr->createImage(20, 40);

//header("Content-type: image/gif");
//imagegif($im);

//imagedestroy($im);

header("Content-Type: image/svg+xml");

$qr->printSVG(20);
