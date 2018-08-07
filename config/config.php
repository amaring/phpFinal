<?php
/*
  This file contains often used constants
*/
  // DB Params - Scrubbed here
	$dbhost = 'localhost';
	$dbuser = 'username';
	$dbpass = 'password';
	$dbname = 'database';

	//Connect
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	printf("MySQLi connection failed: ", mysqli_connect_error());
	exit();
}

// Change character set to utf8
if (!$mysqli->set_charset('utf8')) {
	printf('Error loading character set utf8: %s\n', $mysqli->error);
}
  
  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root (eg. http://myapp.com or http://localhost/myapp)
  define('URLROOT', 'http://DB_HOST/our_site_name');
  // Site Name
  define('SITENAME', 'OUR_SITE_NAME');
  
 ?>
