<?
session_start();

if (strpos($text, 'http://') !== false) echo 'spam';
elseif ($_SESSION['captcha_add']!=$captcha && $_SESSION['visitor_type']!='admin') echo 'auth';
elseif (strpos($mail, '@') === false) echo 'not_mail';
else
{
include $_SERVER['DOCUMENT_ROOT'].'/pattern/db.php';

$name=mysql_real_escape_string($name);
$city=mysql_real_escape_string($city);
$text=mysql_real_escape_string($text);

mysql_query('INSERT INTO responses SET 
response_name="'.$name.'",
response_age="'.$age.'",
response_city="'.$city.'",
response_mail="'.$mail.'",
response_text="'.$text.'",
response_date=NOW()'
);

mysql_close();

echo 'ok';

mail('info@green-yar.ru', 'Новый отзыв!', 'Добрый день, ИМЯ! У Вас на сайте новый отзыв','from: info@info.ru'."\n".'content-type: text/html; charset=utf-8');
}
?>
