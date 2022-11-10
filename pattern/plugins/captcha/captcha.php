<?
$r=mt_rand(1000000, 9999999);
//разбиваем секретный код на массив чисел
for ($i=0; $i<7; ++$i) $arr[$i]=substr($r, $i, 1);
// создаем картинку на белом фоне:
$im=imagecreate(170, 40);
imagecolorallocate($im, 255, 255, 255);
// наносим код на картинку:
$a=0;
for ($i=0; $i<7; ++$i) imagettftext($im, rand(12, 16), rand(-50, 50), $a+=rand(16, 20), rand(15, 30), imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200)), 'arial.ttf', $arr[$i]);
// наносим защитные линии («шум»):
imageline($im, mt_rand(0, 40), mt_rand(0, 20), mt_rand(130, 170), mt_rand(21, 40), imagecolorallocate($im, mt_rand(150, 230), mt_rand(150, 230), mt_rand(150, 230)));
imageline($im, mt_rand(0, 40), mt_rand(21, 40), mt_rand(130, 170), mt_rand(0, 20), imagecolorallocate($im, mt_rand(150, 230), mt_rand(150, 230), mt_rand(150, 230)));
// выводим капчу:
header("Content-type: image/jpeg");
imagejpeg($im, NULL);
imagedestroy($im);

// устанавливаем сессию со значением нашей капчи (для дальнейшей проверки скриптом)
session_start();
$_SESSION['captcha_add']=$r;
?>
