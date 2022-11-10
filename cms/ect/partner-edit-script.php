<? include 'before.php' ?>
<a class=previous href=/cms/>вернуться на главную страницу CMS</a><br><br>
<h1 style="background: url(/pattern/images/icon-edit-32.png) no-repeat">Редактирование информации о резиденте</h1>

<?
$name=addslashes($name);
$address=addslashes($address);
$description=addslashes($description);
$services=addslashes($services);
mysql_query("UPDATE residents SET resident_name='$name', resident_address=IF('$address'='',NULL,'$address'), resident_phone='$phone', resident_http=IF('$http'='',NULL,'$http'), resident_mail='$mail', resident_icq=IF('$icq'='',NULL,'$icq'), resident_skype=IF('$skype'='',NULL,'$skype'), resident_description='$description', resident_services=IF('$services'='',NULL,'$services'), resident_updating_date=NOW(), resident_codeword=IF('$codeword'='',NULL,'$codeword') WHERE resident_id=$id");
mysql_query("INSERT INTO autonews SET autonew_resident_id=$id, autonew_resident_operation=1, autonew_date=NOW()")
?>

<p>Портфолио резидента изменено.</p>

<? include 'after.php' ?>
