<?php

// Script Location:
/*
$root = 'http://shorturl.uphero.com/';
$rooturl = 'http://shorturl.uphero.com/';
$destination = 'http://shorturl.uphero.com/go.php?id=';
*/
$root = 'localhost/phpurl/';
$rooturl = 'http://localhost/phpurl/';
$destination = 'http://localhost/phpurl/go.php?id=';

// Database Information:
/*
$localhost ='mysql16.000webhost.com';
$username ='a5064636_jawad';
$password ='jawad123';
$database ='a5064636_url';
*/
$localhost ='localhost';
$username ='root';
$password ='';
$database ='url_db';

// Admin Username And Password:

$adminuser ='root';
$adminpass ='root123';

// Dont Edit Below:

$table = 'urlmap';

$link = mysql_connect("$localhost", "$username", "$password")or die("Could not connect");
$db = mysql_select_db("$database", $link)or die("Could not select database");

?>