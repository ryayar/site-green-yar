<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<h1 style="background: url(/pattern/images/icon-info-32.png) no-repeat">Сервисная страница</h1>
<?
// сортировка по рубрикам и городам
$query=mysql_query('SELECT category_id, category_name, category_url FROM categories ORDER BY category_sort');
while ($row=mysql_fetch_array($query))
{
$row2=mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM residents WHERE resident_category_id='.$row['category_id'].' AND resident_url IS NOT NULL'));
if ($row2[0]!=0)
	{
	echo '<b>',$row['category_name'],':</b><br><i>';
	$query3=mysql_query('SELECT * FROM cities ORDER BY city_name');
	while ($row3=mysql_fetch_array($query3))
		{
		$row4=mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM residents WHERE resident_category_id='.$row['category_id'].' AND resident_city_id='.$row3['city_id'].' AND resident_url IS NOT NULL'));
		if ($row4[0]!=0) echo '<a href=/residents/',$row3['city_url'],'/',$row['category_url'],'/>',$row3['city_name'],'</a> (',$row4[0],'), ';
		}
	echo ' всего — ',$row2[0],'</i><br><br>';
	}
}
// итого
echo '<br><b>Итого:</b><br><i>';
$query=mysql_query('SELECT city_id, city_name FROM cities ORDER BY city_name ');
while ($row=mysql_fetch_array($query))
	{
	$row2=mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM residents WHERE resident_city_id='.$row['city_id'].' AND resident_url IS NOT NULL'));
	if ($row2[0]!=0) echo $row['city_name'],' (',$row2[0],'), ';
	}
$row=mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM residents WHERE resident_url IS NOT NULL'));
echo ' всего — ',$row[0],'</i><br><br>';
include 'after.php'
?>
