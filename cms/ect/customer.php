<?
$part='customer';
$title='Одобрение нового пользователя';
include 'before.php';

echo '<p><a href=/cms/><img src=/pattern/images/icon-previous.png> Вернуться на главную CMS</a></p><br>
<a href=/cms/customers/><img src=/pattern/images/icon-previous.png> Вернуться к списку новых пользователей</a><br><br>';
 
$row = mysql_fetch_array(mysql_query('SELECT * FROM customers JOIN regions ON customer_region_id=region_id  JOIN countries ON customer_country_id=country_id WHERE customer_id='.$_GET['customer_id']));
//echo mysql_error();
echo '<p id=customer_id hidden>',$row['customer_id'],'</td></tr> 
<table>
<tr><td>Название</td><td style="color:#2b89c3"><b>',$row['customer_name'],'</b></td></tr> 
<tr><td>Регион</td><td>',$row["region_name_$_COOKIE[language]"],'</td></tr>  
<tr><td>Страна</td><td>',$row["country_name_$_COOKIE[language]"],'</td></tr>  
<tr><td>E-mail</td><td>',$row['customer_mail'],'</td></tr>  
<tr><td>Пароль</td><td>',$row['customer_password'],'</td></tr> 
<tr><td>Город</td><td>',$row['customer_city'],'</td></tr> 
<tr><td>Адрес</td><td>',$row['customer_address'],'</td></tr>  
<tr><td>Контактное лицо</td><td>',$row['customer_contact_person'],'</td></tr> 
<tr><td>Телефон контакта</td><td>',$row['customer_phone'],'</td></tr>  
<tr><td>Сайт</td><td>',$row['customer_http'],'</td></tr>'; 

echo'<tr><td>Тип линии</td><td>';
$a=unserialize($row['customer_type_of_plant']); for ($i = 0; $i < count($a); ++$i)
{
if ($a[$i]==1) echo 'Линия оцинкования мелких деталей и крепежа <br>';
elseif ($a[$i]==2) echo 'Линия оцинкования штучных товаров <br>';
elseif ($a[$i]==3) echo 'Линия непрерывного оцинкования <br>';
else echo ($a[$i]);
}
echo '</td></tr>
<tr><td>Интересующие категории</td><td>';
$b=unserialize($row['customer_category']); for ($i = 0; $i < count($b); ++$i)
{
if ($b[$i]==1) echo 'Металл <br>';
elseif ($b[$i]==2) echo 'Химия <br>';
elseif ($b[$i]==3) echo 'Оборудование <br>';
elseif ($b[$i]==4) echo 'Услуги <br>';
elseif ($b[$i]==5) echo 'Консалтинг <br>';
elseif ($b[$i]==6) echo 'Прочее <br>';
}
echo '</td></tr>  
<tr><td>Я рекомендую</td><td>',$row['customer_i_recommend'],'</td></tr> 
</table><br>';
echo '<div class=button id=affirmation> Одобрено </div><br><br>';

include 'after.php'?>
<script>
$("#affirmation").click(function(){new_customer_affirmation($("#customer_id").text())});
</script>
