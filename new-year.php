<?
$part = 'new_year';
$title = 'Новогоднее предложение';
$keywords = 'новый год, банкеты, проживание';
$description = 'Проживание на территории Зеленого Яра в Новогодние праздники.';
include 'pattern/before.php'
?>


<h2>Новогоднее предложение!</h2><br>
<p style="padding: 3px 10px; width: 610px; text-align: center; margin-left: 25px">Проживание с 31 декабря по 2 января (заезд 12:00)<br>
Программа: Новогодний банкет, Дед Мороз и Снегурочка, подарки, конкурсы, и многое другое…<br>
Стоимость: 11 000 руб./чел. (выезд 12:00 2 января).<br><br>
Проживание с 10 декабря по 20 января 1 500 руб./чел. в сутки.<br>
Двухместный номер в коттедже 3 000 руб./сутки<br>
Сауна - 1500 в час.</p>
<img src=/pattern/images/snow.jpg style="width: 675px">

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
