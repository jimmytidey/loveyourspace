<? ini_set('display_errors',1); 
 error_reporting(E_ALL);  ?>
<? include('db_connect.php'); ?>
<? include('get_info.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?=$title ?></title>
				
		<script type="text/javascript" src="javascript/social.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
		<script type="text/javascript" charset="utf-8" src='jquery/script/jquery-ui-1.8.17.custom.min.js'></script>
		
		<link rel="stylesheet" href="jquery/css/jquery-ui-1.8.17.custom.css" type="text/css" media="screen" title="no title">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" >	
	</head>
	
	<body id='<?=$page_name ?>'  >
	    
	    <div id='container'>
	        <a href='/'><img src='resources/purple_logo.png' id='logo' /></a>