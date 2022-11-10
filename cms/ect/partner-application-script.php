<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<a class=previous href=/cms/residents-applications-list/>вернуться к списку заявок</a>
<h1 style="background: url(/pattern/images/icon-residents-32.png) no-repeat">Модерация заявки от нового резидента</h1>

<?
$name=addslashes($name);
$address=addslashes($address);
$description=addslashes($description);
$services=addslashes($services);
mysql_query("UPDATE residents SET resident_url='$url', resident_name='$name', resident_address=IF('$address'='',NULL,'$address'), resident_phone='$phone', resident_http=IF('$http'='',NULL,'$http'), resident_mail='$mail', resident_icq=IF('$icq'='',NULL,'$icq'), resident_skype=IF('$skype'='',NULL,'$skype'), resident_description='$description', resident_services=IF('$services'='',NULL,'$services'), resident_adding_date=NOW(), resident_updating_date=NOW(), resident_codeword=IF('$codeword'='',NULL,'$codeword') WHERE resident_id=$id");
mysql_query("INSERT INTO autonews SET autonew_resident_id=$id, autonew_resident_operation=0, autonew_date=NOW()");
mkdir($_SERVER['DOCUMENT_ROOT'].'/residents/'.$path.'/'.$url,0777,true)
?>

<p>Новый резидент добавлен на сайт.</p>

<? include 'after.php' ?>
