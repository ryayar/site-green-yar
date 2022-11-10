<?
$part='responses';
$title='Отзывы';
$keywords = 'турбаза зеленый яр, отзывы о турбазе';
include 'pattern/before.php'
?>

<div id=responses class=tab>
<span class=response_form_show title="Показать форму для добавления отзыва"><span>добавить отзыв</span></span><br><br>
<div id=response_adding_form style=display:none>
<table width=100%>
<tr><td><span class=add_h>Имя</span> <span class=asterix>*</span></td><td><input id=responser_name style=width:415px name=response_name class=asterix></td></tr>
<tr><td><span class=add_h>Город</span> <span class=asterix>*</span></td><td><input style=width:415px name=response_city class=asterix></td></tr>
<tr><td><span class=add_h>Возраст</span> <span class=asterix>*</span></td><td><input style=width:415px name=response_age class=asterix></td></tr>
<tr><td><span class=add_h>e-mail</span> <span class=asterix>*</span></td><td><input style=width:415px name=response_mail class=asterix></td></tr>
<tr><td><span class=add_h>Отзыв</span> <span class=asterix>*</span></td><td><textarea name=response_text rows=10 style=width:415px;resize:none class=asterix></textarea></td></tr>
<? if ($_SESSION['visitor_type']!='admin') echo '<tr><td><span class=add_h>Защита от автоматической отправки</span> <span class=asterix>*</span><br><br><img id=captcha_add src=/pattern/plugins/captcha/captcha.php><br><span id=captcha_update class=update><span>показать другую картинку</span></span></td><td><input style=width:415px name=captcha class=asterix></td></tr>' ?>
<tr><td>&nbsp;</td><td><p style=display:none id=alert class=asterix>Все поля являются обязательными к заполнению!</p><span class=add_response> Отправить отзыв </span></td></tr>
</table>
</div>
<div></div>
<br>

<?
$responses_query=mysql_query('SELECT * FROM responses WHERE  response_affirm=1 ORDER BY response_date DESC');
if (mysql_num_rows($responses_query)>0) while ($responses_row=mysql_fetch_array($responses_query))
{
echo '<span class=response_head>',date('d.m.y',strtotime($responses_row['response_date'])),', ',$responses_row['response_name'],', ',$responses_row['response_age'];
if ($responses_row['response_age']==11 || $responses_row['response_age']==12 || $responses_row['response_age']==13 || $responses_row['response_age']==14 || $responses_row['response_age']%10==0 || $responses_row['response_age']%10==5 || $responses_row['response_age']%10==6 || $responses_row['response_age']%10==7 || $responses_row['response_age']%10==8 || $responses_row['response_age']%10==9 ) echo ' лет';
elseif ($responses_row['response_age']%10==2 || $responses_row['response_age']%10==3 || $responses_row['response_age']%10==4) echo ' года';
else echo ' год';
echo ', ',$responses_row['response_city'],'</span><br>',str_replace("\n", '<br>', $responses_row['response_text']),'<br><br>';
}
else echo '<span>Отзывов ещё нет. Ваш отзыв будет первым.</span>'
?>
</div>

<!-- начало лайков от соц сетей -->
<div id=SMM>
<ul style="height:40px;list-style:none;margin:0;padding:0;">
<li style=float:left;margin-right:-10px><a id="s-twitter" class="twitter-share-button"> </a></li>
<li style=float:left;margin-right:-5px><div id="s-facebook" class="fb-like" style="margin-right:40px;"></div></li>
<li style=float:left><div id="vk_like"></div></li>
<li style=float:left;margin-right:30px><div id="ok_shareWidget"></div></li>
<li style=float:left><div id="s-google" class="g-plusone"></div></li>
</ul>
</div>
<!-- конец лайков от соц сетей -->

<? include 'pattern/after.php' ?>
<script>
// обновлять картинку капчи, если тяжело читается:
$("#captcha_update").click(function(){$("#captcha_add").attr({src: "/pattern/plugins/captcha/captcha.php"})});

// показывать/скрывать форму для оставления отзыва:
$(".response_form_show").click(function(){$("#response_adding_form").slideToggle(function(){$("#responser_name").focus()})});
// ограничивать вводимые символы в некоторых полях:
$("input[name=response_age]").keyup(function(){$(this).val($(this).val().replace(/[^0-9]+/,""))}); //(/[^0-9]/,'')
$("input[name=response_mail]").keyup(function(){$(this).val($(this).val().replace(/[^0-9A-Za-z-_.@]+/,""))});
// триммировать при потере фокуса:
$("input, textarea").blur(function(){$(this).val($.trim($(this).val()))});
// подгонять textarea для отзывов по высоте по мере ввода текста:
$("textarea[name=response_text]").keyup(function(){$(this).height(this.scrollHeight-6)});

// запись отзыва
$(".add_response").on("click", function(){if ($("#response_adding_form input.asterix").length+$("#response_adding_form textarea.asterix").length) {$("#alert").show(); return false} else add_response()});

// подсвечивать обязательные поля в отзывах:
$("input[name=response_name], input[name=response_city], input[name=response_age], input[name=response_mail], textarea[name=response_text], input[name=captcha]").focus(function(){$("#alert").hide(); $(this).removeClass("asterix")});
$("input[name=response_name], input[name=response_city], input[name=response_age], input[name=response_mail], textarea[name=response_text], input[name=captcha]").blur(function(){if (this.value=="") $(this).addClass("asterix")});
</script>

<script type="text/javascript">
// лайки от соц сетей
(function() {
    function async_load(u,id) {
        if (!gid(id)) {
            s="script", d=document,
            o = d.createElement(s);
            o.type = 'text/javascript';
                        o.id = id;
            o.async = true;
            o.src = u;
            // Creating scripts on page
            x = d.getElementsByTagName(s)[0];
            x.parentNode.insertBefore(o,x);
        }
    }
    function gid (id){
        return document.getElementById(id);
    }
    window.onload = function() {
    
    e = gid("s-twitter");
    e.setAttribute("data-lang", "ru"); 
    
    e = gid("s-facebook");
    e.setAttribute("data-layout", "button_count"); 
    e.setAttribute("data-send", "false"); 
    
    e = gid("s-google");
    e.setAttribute("data-size", "medium"); 
    
    
    async_load("//platform.twitter.com/widgets.js", "id-twitter");//twitter
    async_load("//connect.facebook.net/ru_RU/all.js#xfbml=1", "id-facebook");//facebook
    async_load("https://apis.google.com/js/plusone.js", "id-google");//google
    async_load("//vk.com/js/api/openapi.js", "id-vkontakte");//vkontakte
    };
    // Инициализация vkontakte
    window.vkAsyncInit = function(){
        VK.init({apiId: 3919333, onlyWidgets: true});
        VK.Widgets.Like("vk_like", {type: "button", height: 20});
    };
})();

!function (d, id, did, st) {
  var js = d.createElement("script");
  js.src = "http://connect.ok.ru/connect.js";
  js.onload = js.onreadystatechange = function () {
  if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
    if (!this.executed) {
      this.executed = true;
      setTimeout(function () {
        OK.CONNECT.insertShareWidget(id,did,st);
      }, 0);
    }
  }};
  d.documentElement.appendChild(js);
}(document,"ok_shareWidget","http://green-yar.ru/","{width:145,height:30,st:'rounded',sz:20,ck:1}");
</script>
