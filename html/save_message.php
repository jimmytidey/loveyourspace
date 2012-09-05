<?
include("db_connect.php");
 
$project_id = mysql_real_escape_string($_POST['project_id']);
$message    = mysql_real_escape_string($_POST['message']);
$ip_address = $_SERVER["REMOTE_ADDR"];
$time = time();

$query = ("INSERT INTO messages (IP_address, text, project_id, time) VALUES ('$ip_address', '$message', '$project_id', '$time' )");
mysql_query($query); 
echo $query; 
?>