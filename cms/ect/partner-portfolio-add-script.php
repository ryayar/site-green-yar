<? include 'before.php';
echo '<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br><h1 style="background: url(/pattern/images/icon-photos-add-32.png) no-repeat">Добавление фотографий в портфолио резидента</h1>';

// создаём (если нет) папки для портфолио:
$query=mysql_query('SELECT city_url, category_url, resident_url FROM residents JOIN cities ON resident_city_id=city_id JOIN categories ON resident_category_id=category_id WHERE resident_id='.$resident_id);
$row=mysql_fetch_array($query);
mkdir($_SERVER['DOCUMENT_ROOT'].'/residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-bigs/',0777);
mkdir($_SERVER['DOCUMENT_ROOT'].'/residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-thumbs/',0777);

// вычисляем имя(=номер) крайней фотографии:
$files=scandir('../residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-thumbs');
if ($files && sizeof($files)!=2) $name=$files[sizeof($files)-1][0].$files[sizeof($files)-1][1].$files[sizeof($files)-1][2].$files[sizeof($files)-1][3].$files[sizeof($files)-1][4]; else $name='0';

$files_count=sizeof($_FILES[portfolio_in][name]);

for ($i=0;$i<$files_count;++$i)
{
// вычисление следующего имени для файла:
++$name;
if ($name<10) $number='000'.$name;
elseif ($name<100) $number='00'.$name;
elseif ($name<1000) $number='0'.$name;
elseif ($name<10000) $number=$name;
else exit('Превышен лимит на кол-во фотографий!');

// Создание большой картинки (до 640 px):
$in=$_FILES[portfolio_in][tmp_name][$i]; // путь и имя файла оригинальной картинки
//
$in_cfg=getimagesize($in); // считываем параметры (высота/ширина, тип и т.п.) оригинальной картинки
//
switch ($in_cfg[2]) // в зависимости от типа оригинальной картинки применяем соответствующую функцию для считывания и создания изображения с которым будем работать
	{
	case 1: $src=imagecreatefromgif($in); break;
	case 2: $src=imagecreatefromjpeg($in); break;
	case 3: $src=imagecreatefrompng($in); break;
	default: exit('Неверный формат файла(ов)!<br><br>Вы можете загрузить фотографии только в формате JPG, PNG или GIF!');
	}
//
$img_rate=$in_cfg[0]/$in_cfg[1]; // вычисление соотношений сторон вынесено за условие, т.к., если картинка меньше 640px, то преобразования не нужны, но сам коэффициент $img_rate нужен для thumb
//
if ($in_cfg[0]>640 || $in_cfg[1]>640) // если ширина или высота оригинальной картинки больше ограничения производим вычисления
	{
	$out_big_width=640;
	$out_big_height=$out_big_width;
	if ($img_rate>1) $out_big_height = 640/$img_rate; else $out_big_width = 640*$img_rate; // $img_rate — отношение ширины к высоте
	$out_big = imagecreatetruecolor($out_big_width, $out_big_height); // создание «подкладки»
	imagecopyresampled($out_big, $src, 0, 0, 0, 0, $out_big_width, $out_big_height, $in_cfg[0], $in_cfg[1]); // изменение размера и копирование полученного на «подкладку»
	}
else $out_big = $src; // если изменять размер не надо просто присваиваем переменной $out_big идентификатор оригинальной картинки
//
imagejpeg($out_big, '../residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-bigs/'.$number.'.jpg', 90); // создаёт уменьшенную картинку в качестве 90%

// Создание маленькой картинки (50×50px):
$out_big_to_thumb_width=50;
$out_big_to_thumb_height=$out_big_to_thumb_width;
if ($img_rate>1) $out_big_to_thumb_width = 50*$img_rate; else $out_big_to_thumb_height = 50/$img_rate; // здесь главное — не в писать в размер 50×50px, а чтобы меньшая из сторон была = 50px
//
$out_big_to_thumb = imagecreatetruecolor($out_big_to_thumb_width, $out_big_to_thumb_height); // создание «подкладки»
imagecopyresampled($out_big_to_thumb, $src, 0, 0, 0, 0, $out_big_to_thumb_width, $out_big_to_thumb_height, $in_cfg[0], $in_cfg[1]); // измененяем размера ещё раз (до 50px по минимальной стороне)
//
$out_thumb = imagecreatetruecolor(50, 50); // создаём «подложку»
imagecopy($out_thumb, $out_big_to_thumb, 0, 0, ($out_big_to_thumb_width-50)*0.5, ($out_big_to_thumb_height-50)*0.5, 50, 50); // копируем на «подложку» центр
imagejpeg($out_thumb, '../residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-thumbs/'.$number.'.jpg', 100); // сохраняем thumb
}

// очистить память:
imagedestroy($src);
imagedestroy($out_big);
imagedestroy($out_big_to_thumb);
imagedestroy($out_thumb);

mysql_query("UPDATE residents SET resident_updating_date=NOW() WHERE resident_id=$resident_id");
mysql_query("INSERT INTO autonews SET autonew_resident_id=$resident_id, autonew_resident_operation=1, autonew_date=NOW()");

echo '<p>Портфолио резидента дополнено. Загружено файлов: ',$files_count,'.</p>';
include 'after.php'
?>
