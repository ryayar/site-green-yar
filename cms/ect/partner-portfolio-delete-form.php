<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<h1 style="background: url(/pattern/images/icon-photos-delete-32.png) no-repeat">Удаление фотографий из портфолио резидента</h1>
<form method=post action=/cms/resident-portfolio-delete-script.php>
<?
$row=mysql_fetch_array(mysql_query('SELECT city_url, category_url, resident_url FROM residents JOIN cities ON resident_city_id=city_id JOIN categories ON resident_category_id=category_id WHERE resident_id='.$_GET['resident_id']));
$files=scandir($_SERVER['DOCUMENT_ROOT'].'/residents/'.$row['city_url'].'/'.$row['category_url'].'/'.$row['resident_url'].'/portfolio-thumbs',1);
if ($files && sizeof($files)!=2) for ($i=0; $i<count($files); ++$i) if ($files[$i]!='.' && $files[$i]!='..')
echo '<nobr><input style=position:relative;top:-18px type=checkbox id=',$files[$i],' value=',$files[$i],' name=files[]> <label for=',$files[$i],'><img style=border-radius:4px;margin-top:20px src=/residents/',$row['city_url'],'/',$row['category_url'],'/',$row['resident_url'],'/portfolio-thumbs/',$files[$i],' alt></label></nobr> &nbsp; &nbsp;';
?>
<br><br><br>
<input type=hidden name=resident_id value=<? echo $_GET['resident_id'] ?>>
<input type=submit value="Удалить отмеченные фотографии из портфолио">
</form>
<? include 'after.php' ?>
