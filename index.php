<?
$part='index';
$title='Турбаза Самары «Зелёный Яр»';
$keywords = 'турбаза, самара, зеленый яр';
$description = '«Зеленый Яр» — уникальное, красивейшее место, расположенное на территории Красноярского района Самарской области, в сосновом бору на берегу реки Кондурча.';
include 'pattern/before.php'
?>

<br><p class=colortext><a id=day-helth href=/services/ style="color: #ffa500"><b>Проводим деловые встречи, корпоративы, дни здоровья, банкеты, спартакиады и др.</b></a></p><br>
<h1>Самарская турбаза «Зелёный Яр»</h1>
<p><strong>Базы отдыха Самарской области</strong> всегда пользовались огромной популярностью. Это связано, прежде всего, с выгодным месторасположением и живописной, удивительнейшей природой районов Самары.<p>
<h2>Турбазы Самарской области: истинные красоты природы</h2>
<p>«Зеленый Яр» — уникальное, красивейшее место, расположенное на территории Красноярского района Самарской области, в сосновом бору на берегу реки Кондурча, в 45 км от города Самары. Здесь нет городской суеты, заводов, это место надежно укрыто от шума и посторонних глаз древними хвойными деревьями. Именно такое расположение делает «Зеленый Яр» одним из любимейших мест жителей Самары и области. «Зеленый Яр» идеально подходит не только для спокойного семейного отдыха, но также для активного отдыха с друзьями, проведения банкетов и деловых переговоров.</p>
<p>Помимо традиционных видов отдыха, которые предлагают <strong>базы отдыха области</strong>, «Зеленый Яр» готов предложить и дополнительные услуги: катание на снегоходах, уютная баня, бильярд, лыжи, коньки, детские санки.</p>
<p><strong>Базы отдыха Самары</strong>, в том числе «Зеленый Яр», - это возможность отвлечься от городской суеты, шума и однообразного ритма жизни, зарядиться энергией и получить массу позитива. База отдыха «Зеленый Яр» - это вежливый персонал, высокое качество обслуживания, комфортабельные номера для размещения, чистый воздух, изысканная кухня. Все это сделает Ваш отдых у нас насыщенным и незабываемым. Коттеджи, летние домики, спортивные площадки, бассейн, ресторан, конференц зал и автостоянка расположены на охраняемой и обработанной от клещей территории площадью в три с половиной гектара.</p>
<h2>Турбазы Самары — «Зеленый Яр». Удивительное рядом</h3>
<p>Турбаза «Зелёный Яр» работает круглый год. Размещение возможно как в благоустроенных номерах, так и в домиках летнего типа, которые полностью подходят для отдыха на природе и оснащены всем необходимым для комфортного проживания.</p>
<p>Летний отдых – это самое разнообразное времяпрепровождение: Вы сможете искупаться в реке Кондурча, поиграть в баскетбол, волейбол, футбол, большой или настольный теннис, попариться в русской бане или просто спокойно отдохнуть у открытого бассейна, наслаждаясь чистым воздухом и величественным лесом. Отдых зимой также можно разнообразить катанием на коньках, лыжах и санках, которые можно взять напрокат. Для тех, кто желает приготовить и отведать на природе шашлык, может воспользоваться нашими мангалами.</p>
<br><br>
<p><strong>База отдыха в Самаре</strong> «Зелёный Яр» приглашает Вас в гости!</p>

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
