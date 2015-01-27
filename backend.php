<?php
include("config.php");
mysql_connect($localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$data = array();
$query = "select * from urlmap";
$result = mysql_query($query);

while($row = mysql_fetch_array($result)){
	$data[] = $row; 
}

?>