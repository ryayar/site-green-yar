<?
//считаем фотки существующие и называем по счету отсутствующей.
$x=0;
$images_count=1;
while ($x==0)
{

if ($images_count<10) $number='000'.$images_count;
elseif ($images_count<100) $number='00'.$images_count;
elseif ($images_count<1000) $number='0'.$images_count;
else exit('Превышен лимит на кол-во фотографий!');

if (file_exists($_SERVER['DOCUMENT_ROOT'].'/gallery/bigs/'.$number.'.jpg')) 
{
++$images_count; 
} else $x=1;
}


// Создание большой картинки (до 640 px):
$in = $avatar_in; // путь и имя файла оригинальной картинки file_get_contents

$in_cfg=getimagesize($in); // считываем параметры (высота/ширина, тип и т.п.) оригинальной картинки

switch ($in_cfg[2]) // в зависимости от типа оригинальной картинки применяем соответствующую функцию для считывания и создания изображения с которым будем работать
{
case 1: $src=imagecreatefromgif($in); break;
case 2: $src=imagecreatefromjpeg($in); break;
case 3: $src=imagecreatefrompng($in); break;
default: exit('Неверный формат файла!<br><br>Вы можете загрузить фотографию только в формате JPG, PNG или GIF!');
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

imagejpeg($out_big, '../gallery/bigs/'.$number.'.jpg', 80); // создаёт уменьшенную картинку в качестве 90%

// Создание маленькой картинки (200×200px):
$out_big_to_thumb_width=160;
$out_big_to_thumb_height=$out_big_to_thumb_width;
if ($img_rate>1) $out_big_to_thumb_width = 160*$img_rate; else $out_big_to_thumb_height = 160/$img_rate; // здесь главное — не в писать в размер 200×200px, а чтобы меньшая из сторон была = 200px

$out_big_to_thumb = imagecreatetruecolor($out_big_to_thumb_width, $out_big_to_thumb_height); // создание «подкладки»
imagecopyresampled($out_big_to_thumb, $src, 0, 0, 0, 0, $out_big_to_thumb_width, $out_big_to_thumb_height, $in_cfg[0], $in_cfg[1]); // измененяем размера ещё раз (до 200px по минимальной стороне)

$out_thumb = imagecreatetruecolor(160, 160); // создаём «подложку»
imagecopy($out_thumb, $out_big_to_thumb, 0, 0, ($out_big_to_thumb_width-160)*0.5, ($out_big_to_thumb_height-160)*0.5, 160, 160); // копируем на «подложку» центр
imagejpeg($out_thumb, '../gallery/thumbs/'.$number.'.jpg', 80); // сохраняем thumb

// очистить память:
imagedestroy($src);
imagedestroy($out_big);
imagedestroy($out_big_to_thumb);
imagedestroy($out_thumb);

print '<script>window.parent.document.getElementById("dndspan").innerHTML="<img src=/gallery/thumbs/'.$number.'.jpg>" </script>';
