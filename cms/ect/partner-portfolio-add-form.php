<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<h1 style="background: url(/pattern/images/icon-photos-add-32.png) no-repeat">Добавление фотографий в портфолио резидента</h1>
Вы можете загрузить фотографии в форматах JPG, PNG или GIF любого размера, но не более 20 штук за раз.<br><br>
Все фотографии будут уменьшены до 640px по бо́льшей стороне.<br><br>
Для каждой фотографии будет создана маленькая фотография (предпросмотр), которая будет вписана в квадрат 50×50px.<br><br>
<form method=post action=/cms/resident-portfolio-add-script.php enctype=multipart/form-data>
<div id=dnddiv>
<span id=dndspan>затащите файл(ы) сюда с рабочего стола<br><br>или нажмите здесь для ручного выбора из папки</span>
<input id=dndinput type=file name=portfolio_in[] multiple accept=image/*>
</div>
<br><br>
<input type=hidden name=resident_id value=<? echo $_GET['resident_id'] ?>>
<input type=submit value="Добавить в портфолио">
</form>
<? include 'after.php' ?>

<script>
$(document).ready(function()
{
// при выборе картинок показывать их имена:
$("#dndinput").change(function()
{
var files = $("#dndinput")[0].files;
$("#dndspan").html("<b>Выбрано файлов — "+files.length+":</b><br><br>");
for (i=0; i<files.length-1; i++) $("#dndspan").append(files[i].name+', ');
$("#dndspan").append(files[i].name);
if (files.length>20) $("#dndspan").append("<br><br><span style=color:red>Внимание! Будут загружены только первые 20 файлов!</span>");
});
}
);
</script>
