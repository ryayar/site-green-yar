<?

function check_visitor()
{
if (isset($_SESSION['visitor_type'])) echo '<div id=enter>',$_SESSION['visitor_alias'],' | <a href=/?logout class=logout title=Выйти>exit</a></div>'; // если мы уже авторизованы
elseif ($_POST['visitor_email'] || $_POST['visitor_password']) // если была попытка авторизоваться
	{
	if (($_POST['visitor_email']=='USER_LOGIN') && ($_POST['visitor_password']=='USER_PASS')) // сначала проверяемся на администратора
		{
		$_SESSION['visitor_type']='admin';
		$_SESSION['visitor_alias']='<a class=visitor_alias href=/cms/ target=_blank>Администратор</a>';
		session_write_close();
		echo '<div id=enter>',$_SESSION['visitor_alias'],'  <a href=/?logout class=logout title=Выйти> exit</a></div>';
		}
	else echo '<div id=enter> <a class=sign href=/#/>Wi-Fi</a><span style=color:#268f26> бесплатно</span>  </div> <div class=auth style=display:block><form method=post><input name=visitor_email placeholder=логин><input type=password name=visitor_password placeholder=пароль><br><input type=submit value=войти><span style=color:red>Ошибочные данные, попробуйте ещё раз.</span></form></div>'; // если ввели ошибочные данные
	}
else echo '<div id=enter> <a class=sign href=/#/>Wi-Fi</a><span style=color:#268f26> бесплатно</span>   </div><div class=auth><form method=post><input name=visitor_email placeholder=логин><br><input type=password name=visitor_password placeholder=пароль><br><input type=submit style=width:178px value=войти></form></div>'; // если не было попытки авторизоваться
}

// генерирование promo на главной странице:
function get_promo()
{
echo '<div id=promo>';

$promo=array();
$files=scandir('promo');

for ($i=0;$i<count($files);++$i) if ($files[$i]!='.' && $files[$i]!='..') echo '<img src=/promo/',$files[$i],' alt>';

echo '</div>';
}

// генерирование collage на внутренних страницах:
function get_collage()
{
echo '<div id=collage>';

$collage=array();
$files=scandir('gallery/thumbs');

for ($i=0;$i<6;++$i)
	{
	do {$n=mt_rand(0,count($files)-1);} while (in_array($n, $collage) || $files[$n]=='.' || $files[$n]=='..');
	$collage[]=$n;
	if ($i!=5) echo '<img src=/gallery/thumbs/',$files[$n],' alt>';
	else echo '<img src=/gallery/thumbs/',$files[$n],' alt class=last>';
	}

echo '</div>';
}

// генерирование фотогалереи:
function generate_gallery()
{
$files=scandir('gallery/thumbs',1);

for ($i=0; $i<count($files); ++$i) if ($files[$i]!='.' && $files[$i]!='..') echo '<div><a class=gallery href=/gallery/bigs/',$files[$i],'><img src=/gallery/thumbs/',$files[$i],' alt></a></div>';
}
?>
