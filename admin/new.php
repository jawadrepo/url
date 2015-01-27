<?php

include("../config.php");
include("common.php");
checklogin();

$msg = "";
$id = "";
$url = "";
$ip = "Admin";
$id2 = mysql_real_escape_string($_GET['id']);


if(isset($_POST['Submit'])) {

	$id = mysql_real_escape_string($_POST['id']);
	$url = mysql_real_escape_string($_POST['url']);
	$tag = mysql_real_escape_string($_POST['tag']);
	
	if(!isset($_GET['id'])) {
		$result = mysql_query("Insert into url(id,url,ip,tag) values('$id','$url','$ip','$tag')") or die('MySQL error: '.mysql_error());
		if (mysql_affected_rows() != 0)
			$msg = "Url is saved";
		else
			$msg = "Error saving URL";
	} else {
		$result = mysql_query("Update url set id='$id', tag='$tag', url='$url' where id=".$id2);
		$msg = "Url is updated";
	}
}
if(isset($_GET['id'])) {
	$result = mysql_query("Select * From url where id=".$id2, $link);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$id = $row['id'];
	$tag = $row['tag'];
	$url = $row['url'];
	$ip = $row['ip'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<h1>New / Edit Url</h1>
<br />
<br />

<table border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
    <tr> 
<td align="center"><img src="images/home.gif" alt="Home" /></td>
<td align="center">&nbsp;&nbsp;<img src="images/logout.gif" alt="Logout" /></td>
    </tr>
    <tr> 

<td align="center"><a href="index.php">Home</a></td>
<td align="center"><a href="logout.php">Logout</a></td>
    </tr>
  </table>

<p><?php echo $msg?></p>
<form name="form1" method="post" action="">
  <br />
<table border="0" cellpadding="1" cellspacing="1" bordercolor="#000000">
    <tr> 
      <td align="center">ID:</td>
      <td><input name="id" type="text" id="id" value="<?php echo $id?>"></td>
    </tr>
    <tr> 
      <td align="center">Tag:</td>
      <td><input name="tag" type="text" id="tag" value="<?php echo $tag?>"></td>
    </tr>
    <tr> 
      <td align="center">IP:</td>
      <td><input name="ip" type="text" id="ip" value="<?php echo $ip?>"></td>
    </tr>
    <tr> 
      <td align="center">URL:</td>
      <td><textarea name="url" rows="10" cols="50" id="textarea2"><?php echo $url?></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>
</body>
</html>
