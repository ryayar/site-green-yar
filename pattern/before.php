<?
// включение сессий, проверка на разлогинивание:
session_start();
//
if (isset($_GET['logout'])) // если был переход по ссылке «Выйти»
{
session_unset();
session_destroy();
header('Location: /'); exit();
}

include $_SERVER['DOCUMENT_ROOT'].'/pattern/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/pattern/functions.php'
?>

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<meta name=SKYPE_TOOLBAR content=SKYPE_TOOLBAR_PARSER_COMPATIBLE>
<meta name=keywords content="<?=$keywords?>">
<meta name=description content="<?=$description?>">
<title><?=$title?></title>
<link rel=icon href=/pattern/favicon.ico>
<link rel=stylesheet href=/pattern/styles.css>
<link rel=stylesheet href=/pattern/plugins/colorbox/colorbox.css>
<script src=/pattern/plugins/jquery-1.8.2.min.js></script>
<script src=/pattern/plugins/jscroller-0.4.js></script>
<script src=/pattern/plugins/jquery.cycle.all.min.js></script>
<script src=/pattern/plugins/colorbox/colorbox.js></script>
</head>
<body>

<? check_visitor() // основная логика авторизации пользователей ?>

<? if ($part!='index') echo '<a href=/ title="На главную"><img id=logo src=/pattern/images/logo.png alt="База отдыха «Зелёный Яр»"></a>'; else echo '<img id=logo src=/pattern/images/logo.png alt="База отдыха «Зелёный Яр»">' ?>

<div id=marquee_container>
<div id=marquee>
<a href=/new-year/><b>Новогоднее предложение: Проживание в коттеджах с 10 декабря по 20 января от 1 500 руб./чел. в сутки. Корпоративный отдых, праздничные банкеты, развлекательная программа, санки, коньки и другие зимние радости!</b></a>
</div>
</div>

<div id=menu>
<?
if ($part!='index') echo '<a href=/>Главная</a>'; else echo '<span>Главная</span>';
if ($part!='services') echo '<a href=/services/>Цены</a>'; else echo '<span>Цены</span>';
if ($part!='new_year') echo '<a href=/new-year/>Новый&nbsp;год</a>'; else echo '<span>Новый&nbsp;год</span>';
if ($part!='gallery') echo '<a href=/gallery/>Фотогалерея</a>'; else echo '<span>Фотогалерея</span>';
//if ($part!='booking') echo '<a href=/booking/>Путёвки</a>'; else echo '<span>Путёвки</span>';
if ($part!='responses') echo '<a href=/responses/>Отзывы</a>'; else echo '<span>Отзывы</span>';
if ($part!='jobs') echo '<a href=/jobs/>Вакансии</a>'; else echo '<span>Вакансии</span>';
if ($part!='contacts') echo '<a href=/contacts/>Контакты</a>'; else echo '<span>Контакты</span>';
echo '<a rel=nofollow href=http://vk.com/club42718699 target="_blank">vk.com<img style="position: relative; top: 2px; margin-left: 10px" src=/pattern/images/icon-vk.png></a>';
?>
</div>

<?
if ($part!='index' && $part!='gallery') get_collage();
elseif ($part!='gallery') get_promo();
?>

<div id=content<? if ($part=='gallery') echo ' class=invisible' ?>>
