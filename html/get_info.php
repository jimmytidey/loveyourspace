<?
$query  = "SELECT * from projects WHERE id='$project_id'";
$result = mysql_query($query);
$project_data = mysql_fetch_array($result); 
if(empty($project_data)){ 
    header("Status: 404 Not Found"); 
    echo "ERROR - the id in URL does not exist";
    exit;
}

$query  = "SELECT * from messages WHERE project_id='$project_id'";
$result = mysql_query($query);
$message_data = array();
while($row=mysql_fetch_assoc($result)) {array_push($message_data, $row);}  
if(empty($message_data)){ 
    $message_data[0] = 'there are no comments';
}
 

?>