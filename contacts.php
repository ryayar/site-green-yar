<?
$part='contacts';
$title='Контакты базы отдыха «Зелёный Яр»';
$keywords = 'контакты турбазы';
$description = 'Самарская обл., Красноярский район, село Екатериновка, база отдыха «Зеленый Яр»';
include 'pattern/before.php'
?>

<h1>Контакты</h1>
<p>Самарская обл., Красноярский район, село Екатериновка, база отдыха «Зеленый Яр»</p>
<p>Тел.: 8 999 999-99-99, (999) 999-99-99</p>
<p>E-mail: <a href="mailto:info@info.ru">info@info.ru</a> </p>

<h2 style=text-align:left>Корпоративным клиентам</h2>
<p>Предоставляются особые условия.</p>
<p>Приглашаем партнеров для заключения договоров.</p>
<p>По вопросам сотрудничества обращаться по тел. 8 999 999-99-99, ИМЯ.</p>

<!-- Яндекс.Карта -->
<div id="ymaps-map-id_1343375140740252826568" style="width: 600px; height: 400px;"></div>
<script type="text/javascript">function fid_1343375140740252826568(ymaps) {var map = new ymaps.Map("ymaps-map-id_1343375140740252826568", {center: [50.23824352116328, 53.45378310051328], zoom: 9, type: "yandex#hybrid"});map.controls.add("zoomControl").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));map.geoObjects.add(new ymaps.Placemark([50.29825683000488, 53.55600516077043], {balloonContent: "База отдыха «Зелёный Яр»"}, {preset: "twirl#lightblueDotIcon"}));};</script>
<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_1343375140740252826568"></script>
<!-- / Яндекс.Карта -->

<? include 'pattern/after.php';
