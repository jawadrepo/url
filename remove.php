<?php
ob_start();
include("config.php"); 

if(isset($_GET['id'])) {
	$gid = mysql_real_escape_string($_GET['id']);
	@mysql_query("DELETE FROM urlmap WHERE `unique`='".$gid."';") or die('MySQL error: '.mysql_error());
}

ob_flush();
?>