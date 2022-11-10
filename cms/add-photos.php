<? include 'before.php'; 

echo '<h2>Добавление фотографий<h2>

Вы можете загрузить фотографию в формате JPG, PNG или GIF любого размера. Для увеличенной аватарки фотография будет уменьшена до 450px по бо́льшей стороне.<br><br>
<form method=post target=hidden_frame action=/cms/upload-photo.php enctype=multipart/form-data>
<div id=dnddiv>
<span id=dndspan>Затащите файл сюда с рабочего стола<br><br>или нажмите здесь для ручного выбора из папки</span>
<input id=dndinput type=file name=avatar_in accept=image/*>
<input style=display:none type=submit>
</div>
</form>
<iframe name=hidden_frame style=display:none></iframe>
<br><br>';

include 'after.php';
?>

<script>
$("#dndinput").on("change", function(){ $(this).prev().text("Подождите, идет загрузка изображения…"); $(this).next().trigger("click")});
</script>
