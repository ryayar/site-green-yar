<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<a class=previous href=/cms/responses-new-list/>вернуться к списку новых отзывов</a>
<h1 style="background: url(/pattern/images/comment_add.png) no-repeat">Новые отзывы о турбазе</h1>

<?
if (isset($_POST['add']))
	{
	mysql_query('UPDATE responses SET response_text=\''.mysql_real_escape_string($text).'\', response_affirm=1 WHERE response_id='.$id);
	echo '<p>Новый отзыв добавлен на сайт.</p>';
	}
elseif (isset($_POST['del']))
	{
	mysql_query('DELETE FROM responses WHERE response_id='.$id);
	echo '<p>Отзыв удалён.</p>';
	}

include 'after.php'
?>
