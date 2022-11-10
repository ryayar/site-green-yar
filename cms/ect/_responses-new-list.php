<? include 'before.php' ?>

<a class=previous href=/cms/>вернуться на главную страницу CMS</a>
<h1 style="background: url(/pattern/images/icon-responses-32.png) no-repeat">Новые отзывы о резидентах</h1>

<?
$query=mysql_query('SELECT * FROM responses JOIN residents ON response_resident_id=resident_id JOIN cities ON resident_city_id=city_id JOIN categories ON resident_category_id=category_id WHERE response_affirm=0 ORDER BY response_date');
while ($row=mysql_fetch_array($query)) echo $row['city_name'],' / ',$row['category_name'],' / <a href=/resident/',$row['city_url'],'/',$row['category_url'],'/',$row['resident_url'],'/>',$row['resident_name'],'</a>',':<br><span class=response_head>',date('d.m.y',strtotime($row['response_date'])),', ',$row['response_name'],' (<a href=mailto:',$row['response_mail'],'>',$row['response_mail'],'</a>), ',$row['response_age'],', ',$row['response_city'],'</span><br><form method=post action=/cms/responses-new-script/><input name=id type=hidden value=',$row['response_id'],'><textarea name=text style=width:900px;resize:none>',$row['response_text'],'</textarea><input type=submit name=add value="Опубликовать на сайте"><input type=submit name=del style=float:right;color:red value="Удалить отзыв"></form><br><br>';
echo '<br><br>';

include 'after.php'
?>

<script>
$(document).ready(function(){
// при загрузке все texarea автоматически подогнать по высоте:
$("textarea").each(function(){$(this).height(this.scrollHeight-6)});

// далее подгонять по высоте по мере ввода текста:
$("textarea").keyup(function(){$(this).height(this.scrollHeight-6)});

// триммировать при потере фокуса:
$("textarea").blur(function(){$(this).val($.trim($(this).val()))});

// подсвечивать удаляемый отзыв:
$("input[name=del]").mouseover(function(){$(this).prev().prev().css({background: "#f99", color: "#fff"})});
$("input[name=del]").mouseout(function(){$(this).prev().prev().css({background: "#fafafa", color: "#999"})});
});
</script>
