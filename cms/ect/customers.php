<?
$part='customer_add';
$title='Добавление нового партнера';
include 'before.php';

echo '<a href=/cms.php><img src=/pattern/images/icon-previous.png> Вернуться на главную CMS</a><br><br>';


$query = mysql_query('SELECT * FROM customers  WHERE customer_adding_date IS NULL ORDER BY customer_id DESC');
while ($row=mysql_fetch_array($query))

{
echo
'<p hidden>',$row['customer_id'],'</p><br>
<p><a href=/cms/customer/',$row['customer_id'],'/>',$row['customer_name'],'</a></p><br>'; 
}

include 'after.php'
?>








