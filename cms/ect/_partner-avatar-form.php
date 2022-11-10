<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<h1 style="background: url(/pattern/images/icon-photo-edit-32.png) no-repeat">Изменение аватарки резидента</h1>
Вы можете загрузить фотографию в формате JPG, PNG или GIF любого размера.<br><br>
Для увеличенной аватарки фотография будет уменьшена до 640px по бо́льшей стороне.<br><br>
Для маленькой аватарки фотография будет вписана в квадрат 90×90px.<br><br>
<form method=post action=/cms/resident-avatar-script.php enctype=multipart/form-data>
<div id=dnddiv>
<span id=dndspan>затащите файл сюда с рабочего стола<br><br>или нажмите здесь для ручного выбора из папки</span>
<input id=dndinput type=file name=avatar_in accept=image/*>
</div>
<input type=hidden name=resident_id value=<? echo $_GET['resident_id'] ?>>
<br><br>
<input type=submit value="Изменить аватарку">
</form>
<? include 'after.php' ?>

<script>
$(document).ready(function(){
// при выборе картинки показывать её имя:
$("#dndinput").change(function(){$("#dndspan").text($(this).val())});
});
</script>
