<? include 'before.php';
echo '<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br><h1 style="background: url(/pattern/images/icon-photos-delete-32.png) no-repeat">Удаление фотографий из портфолио резидента</h1>';

if (isset($_POST['files']))
{
$row=mysql_fetch_array(mysql_query('SELECT city_url, category_url, resident_url FROM residents JOIN cities ON resident_city_id=city_id JOIN categories ON resident_category_id=category_id WHERE resident_id='.$_POST['resident_id']));

$files=$_POST['files'];
$count=count($files);
for ($i=0;$i<$count;++$i)
	{
	unlink($_SERVER['DOCUMENT_ROOT'].'/residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-thumbs/'.$files[$i]);
	unlink($_SERVER['DOCUMENT_ROOT'].'/residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-bigs/'.$files[$i]);
	}

// грамотный счётчик удалённых фотографий:
echo $count,' фотографи';
if ($count==11 || $count==12 || $count==13 || $count==14 || $count%10==0 || $count%10==5 || $count%10==6 || $count%10==7 || $count%10==8 || $count%10==9 ) echo 'й удалено.';
elseif ($count%10==2 || $count%10==3 || $count%10==4) echo 'и удалены.';
else echo 'я удалена.';
}

else echo 'Выберите хотя бы одну фотографию.';

include 'after.php'
?>
