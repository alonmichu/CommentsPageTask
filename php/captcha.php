<?php
session_start();
$codigoCaptcha = substr(md5 (time()) ,0, 5);

$_SESSION['captcha'] = $codigoCaptcha;

$imagemCaptcha = imagecreatefrompng("fundocaptch.png");

$fonteCaptcha = imageloadfont("anonymous.gdf");

$corcaptcha = imagecolorallocate($imagemCaptcha, 0,98,255);

imagestring($imagemCaptcha, $fonteCaptcha, 15, 5, $codigoCaptcha, $corcaptcha);

imagepng($imagemCaptcha);

imagedestroy($imagemCaptcha);
?>