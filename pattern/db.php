<?
mysql_connect('localhost', 'DB_NAME', 'DB_PASS') or exit('Connection ERROR!');
mysql_select_db('DB_NAME') or exit('DB ERROR!');
mysql_query('SET NAMES utf8');
