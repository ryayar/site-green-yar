<?
include 'before.php';
include '/home/a/arrieraru/pr-salon.arriera.ru/public_html/pattern/functions.php'
?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<h1 style="background: url(/pattern/images/icon-edit-32.png) no-repeat">Редактирование информации о резиденте</h1>
<?
$query=mysql_query('SELECT * FROM residents JOIN cities ON resident_city_id=city_id JOIN categories ON resident_category_id=category_id WHERE resident_id='.$_GET['resident_id']);
$row=mysql_fetch_array($query);
echo '<form method=post action=/cms/resident-edit-script/><table>
<tr><td><span class=add_h>ID</span></td><td><input type=hidden name=id value="',$_GET['resident_id'],'">',$_GET['resident_id'],'</td></tr>
<tr><td><span class=add_h>Город</span></td><td>',$row['city_name'],'</td></tr>
<tr><td><span class=add_h>Рубрика</span></td><td>',$row['category_name'],'</td></tr>
<tr><td><span class=add_h>Название</span></td><td><input style=width:700px name=name value="',$row['resident_name'],'"></td></tr>
<tr><td><span class=add_h>Адрес</span></td><td><input style=width:700px name=address value="',$row['resident_address'],'"></td></tr>
<tr><td><span class=add_h>Телефон</span></td><td><input style=width:700px name=phone value="',$row['resident_phone'],'"></td></tr>
<tr><td><span class=add_h>Сайт</span></td><td><input style=width:700px name=http value="',$row['resident_http'],'"></td></tr>
<tr><td><span class=add_h>e-mail</span></td><td><input style=width:700px name=mail value="',$row['resident_mail'],'"></td></tr>
<tr><td><span class=add_h>ICQ</span></td><td><input style=width:700px name=icq value="',$row['resident_icq'],'"></td></tr>
<tr><td><span class=add_h>Skype</span></td><td><input style=width:700px name=skype value="',$row['resident_skype'],'"></td></tr>
<tr><td><span class=add_h>Описание</span></td><td><textarea name=description style=width:700px;resize:none>',$row['resident_description'],'</textarea></td></tr>
<tr><td><span class=add_h>Услуги и цены</span></td><td><textarea name=services style=width:700px;resize:none>',$row['resident_services'],'</textarea></td></tr>
<tr><td><span class=add_h>Кодовое слово для скидки</span></td><td><input style=width:700px name=codeword value="',$row['resident_codeword'],'"></td></tr>
<tr><td>&nbsp;</td><td><input type=submit value="Внести изменения"></td></tr></table></form>';
include 'after.php'
?>

<script>
$(document).ready(function(){
// при загрузке все texarea автоматически подогнать по высоте:
$("textarea").each(function(){$(this).height(this.scrollHeight-6)});

// далее подгонять по высоте по мере ввода текста:
$("textarea").keyup(function(){$(this).height(this.scrollHeight-6)});

// ограничивать вводимые символы в некоторых полях:
$("input[name=phone]").keyup(function(){$(this).val($(this).val().replace(/[^0-9-()+ДОБдоб., ]+/,""))});
$("input[name=mail]").keyup(function(){$(this).val($(this).val().replace(/[^0-9A-Za-z-_.@]+/,""))});
$("input[name=http]").keyup(function(){$(this).val($(this).val().replace(/[^0-9A-Za-z-_.:\/?&=]+/,""))}); // \/ — экранирует слэш
$("input[name=icq]").keyup(function(){$(this).val($(this).val().replace(/[^0-9, ]+/,""))});
$("input[name=skype]").keyup(function(){$(this).val($(this).val().replace(/[^0-9A-Za-z-_., ]+/,""))});

// триммировать при потере фокуса:
$("input, textarea").blur(function(){$(this).val($.trim($(this).val()))});
});
</script>
