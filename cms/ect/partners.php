<?
$part='partner_add';
$title='Добавление нового партнера';
include 'before.php';

echo '<a href=/cms.php><img src=/pattern/images/icon-previous.png> Вернуться на главную CMS</a><br><br>';

$query = mysql_query('SELECT * FROM partners  WHERE partner_adding_date IS NULL ORDER BY partner_id DESC');
while ($row=mysql_fetch_array($query))

{
echo 
'<p hidden>',$row['partner_id'],'</p>
<p><a href=/cms/partner/',$row['partner_id'],'/>',$row['partner_name'],'</a></p>
<br><br>'; 
}
echo mysql_error();
include 'after.php'
?>








