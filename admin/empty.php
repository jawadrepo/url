<?php
function checklogin()
{
	session_start();
	if(!isset($_SESSION['adminok']))
		header("location: login.php");
}
checklogin();

if($_SESSION['adminok']){
include("../config.php");

$sql = "TRUNCATE TABLE `url`";

mysql_query($sql);

mysql_close($connection);
header("Location: index.php"); }

?>