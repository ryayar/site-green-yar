$("#promo").cycle({fx: "fade", speed: 1000, timeout: 6000});
$("a.gallery").colorbox({rel:"gallery"});

function add_response()
{
var adding_operation = ($.ajax({
url: "/pattern/ajax/response-add.php",
data:
{
name: $("input[name=response_name]").val(),
age: $("input[name=response_age]").val(),
city: $("input[name=response_city]").val(),
mail: $("input[name=response_mail]").val(),
text: $("textarea[name=response_text]").val(),
captcha: $("input[name=captcha]").val()
},
async: false
}).responseText);

if (adding_operation == "spam") $("#response_adding_form").hide().next().html("<h1>Отзыв забракован!</h1><p>У нас есть подозрения, что вы распространяете СПАМ.</p>");
else if (adding_operation == "auth")
{
alert("Вы ввели неверную капчу, введите её заново!");
$("#captcha_add").attr({src: "/pattern/plugins/captcha/captcha.php"});
$("input[name=captcha]").val("").focus();
}
else if (adding_operation == "not_mail") alert("Введите корректный e-mail!");
else if (adding_operation == "ok") $("#response_adding_form").hide().next().html("<p>Ваш отзыв отправлен.</p><p>Он появится на сайте после модерации.</p>");
}
