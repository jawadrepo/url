<?php
ob_start();
include("config.php"); 

if(isset($_GET['id'])) {
	$gid = mysql_real_escape_string($_GET['id']);
	$result = mysql_query("SELECT * FROM `".$table."` WHERE `unique` = '".$gid."';") or die('MySQL error: '.mysql_error());
	
	while($data = mysql_fetch_array($result)) {
		header("Location: ".$data['url']);
		die;
	}
}

ob_flush();
?>