<?
session_start();
if ($_SESSION['visitor_type']!='admin') exit('Admin ERROR');

include $_SERVER['DOCUMENT_ROOT'].'/pattern/db.php'
?>

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<meta name=SKYPE_TOOLBAR content=SKYPE_TOOLBAR_PARSER_COMPATIBLE>
<link rel=stylesheet href=/pattern/styles.css>
<script src=../pattern/plugins/jquery-1.8.2.min.js></script>
</head>
<body>

<div id=cms>
<br>
