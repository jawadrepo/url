<?php
include("config.php");
if (strstr($_SERVER['HTTP_REFERER'], $root));
else { header ("Location: $rooturl"); }

$ip = $_SERVER['REMOTE_ADDR'];
$url = mysql_real_escape_string($_POST['url']);

if(preg_match('|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url)) {
	$query = mysql_query("INSERT INTO `$table` (`unique`,`url`) VALUES ('".uniqid()."','$url')") or die('MySQL error: '.mysql_error());
	header("Location: ".$rooturl);
} else
	echo 'URL is invalid';

?>