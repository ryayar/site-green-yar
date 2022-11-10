<?
$part='partner';
$title='Добавление нового партнера';
include 'before.php';

echo '<p><a href=/cms/><img src=/pattern/images/icon-previous.png> Вернуться на главную CMS</a></p><br>
<a href=/cms/partners/><img src=/pattern/images/icon-previous.png> Вернуться к списку новых партнеров</a><br><br>';

$row = mysql_fetch_array(mysql_query('SELECT * FROM partners JOIN regions ON partner_region_id=region_id  JOIN countries ON partner_country_id=country_id WHERE partner_id='.$_GET['partner_id']));

echo '<p id=partner_id hidden>',$row['partner_id'],'</p>
<table>
<tr><td>Название</td><td style="color:#2b89c3"><b>',$row['partner_name'],'</b></td></tr>
<tr><td>Регион</td><td>',$row["region_name_$_COOKIE[language]"],'</td></tr> 
<tr><td>Страна</td><td>',$row["country_name_$_COOKIE[language]"],'</td></tr> 
<tr><td>Категория</td><td>';
$a=explode("|" ,  $row['partner_category_id']);
for($i = 0; $i < count($a); ++$i)
{
if ($a[$i][0]==1) echo 'Металл<br>'; elseif ($a[$i][0]==2) echo 'Химия<br>'; elseif ($a[$i][0]==3) echo 'Оборудование<br>'; elseif ($a[$i][0]==4) echo 'Услуги<br>'; elseif ($a[$i][0]==5) echo 'Консалтинг<br>'; elseif ($a[$i][0]==6) echo 'Прочее<br>';
if ($a[$i][1]==1) echo 'Металл<br>'; elseif ($a[$i][1]==2) echo 'Химия<br>'; elseif ($a[$i][1]==3) echo 'Оборудование<br>'; elseif ($a[$i][1]==4) echo 'Услуги<br>'; elseif ($a[$i][1]==5) echo 'Консалтинг<br>'; elseif ($a[$i][1]==6) echo 'Прочее<br>';
if ($a[$i][2]==1) echo 'Металл<br>'; elseif ($a[$i][2]==2) echo 'Химия<br>'; elseif ($a[$i][2]==3) echo 'Оборудование<br>'; elseif ($a[$i][2]==4) echo 'Услуги<br>'; elseif ($a[$i][1]==5) echo 'Консалтинг<br>'; elseif ($a[$i][2]==6) echo 'Прочее<br>';
if ($a[$i][3]==1) echo 'Металл<br>'; elseif ($a[$i][3]==2) echo 'Химия<br>'; elseif ($a[$i][3]==3) echo 'Оборудование<br>'; elseif ($a[$i][3]==4) echo 'Услуги<br>'; elseif ($a[$i][2]==5) echo 'Консалтинг<br>'; elseif ($a[$i][3]==6) echo 'Прочее<br>';
if ($a[$i][4]==1) echo 'Металл<br>'; elseif ($a[$i][4]==2) echo 'Химия<br>'; elseif ($a[$i][4]==3) echo 'Оборудование<br>'; elseif ($a[$i][4]==4) echo 'Услуги<br>'; elseif ($a[$i][4]==5) echo 'Консалтинг<br>'; elseif ($a[$i][4]==6) echo 'Прочее<br>';
if ($a[$i][5]==1) echo 'Металл<br>'; elseif ($a[$i][5]==2) echo 'Химия<br>'; elseif ($a[$i][5]==3) echo 'Оборудование<br>'; elseif ($a[$i][5]==4) echo 'Услуги<br>'; elseif ($a[$i][5]==5) echo 'Консалтинг<br>'; elseif ($a[$i][5]==6) echo 'Прочее<br>';
}
echo '</td></tr>
<tr><td>E-mail</td><td>',$row['partner_mail'],'</td></tr> 
<tr><td>Пароль</td><td>',$row['partner_password'],'</td></tr>
<tr><td>Город</td><td>',$row['partner_city'],'</td></tr>
<tr><td>Адрес</td><td>',$row['partner_address'],'</td></tr> 
<tr><td>Контактное лицо</td><td>',$row['partner_contact_person'],'</td></tr>
<tr><td>Телефон контакта</td><td>',$row['partner_phone'],'</td></tr> 
<tr><td>Сайт</td><td>',$row['partner_http'],'</td></tr> 
<tr><td>Рекомендовали меня</td><td>',$row['partner_recommended_me'],'</td></tr>
<tr><td>Я рекомендую</td><td>',$row['partner_i_recommend'],'</td></tr>
</table><br><br>';
echo '<div class=button id=affirmation> Одобрено </div><br><br>';

//JOIN categories ON partner_category_id=category_id
include 'after.php'?>
<script>
$("#affirmation").click(function(){new_partner_affirmation($("#partner_id").text())});
</script>
