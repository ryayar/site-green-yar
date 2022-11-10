<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a>
<h1 style="background: url(/pattern/images/icon-residents-32.png) no-repeat">Заявки от новых резидентов</h1>
<?
$query=mysql_query('SELECT * FROM residents JOIN cities ON resident_city_id=city_id JOIN categories ON resident_category_id=category_id WHERE resident_url IS NULL ORDER BY resident_id');
while ($row=mysql_fetch_array($query)) echo '<p><a href=/cms/resident-application-form/?resident_id=',$row['resident_id'],'>',$row['resident_name'],'</a><br>',$row['city_name'],', ',$row['category_name'],'</p>';

include 'after.php'
?>
