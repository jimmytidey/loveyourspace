<?
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'lys';
mysql_select_db($dbname);

?>