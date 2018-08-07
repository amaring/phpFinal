<?php
/*
  This file contains often used constants

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root (eg. http://myapp.com or http://localhost/myapp)
  define('URLROOT', 'http://DB_HOST/our_site_name');
  // Site Name
  define('SITENAME', 'OUR_SITE_NAME');
*/

error_reporting(0);
ini_set('display_errors'), '0');

date_default_timezone_set('America/New_York');

// Db Params
$dbhost = 'localhost';
$dbuser = 'sitename_user';
$dbpass = '';
$dbname = 'sitename_database';

//Connect
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
  printf("MySQLi connection failed: ". mysqli_connect_error());
  exit();
}

// Ensure we're using UTF-8
if (!mysqli->set_charset('utf8')) {
  printf('Error loading character set utf8: %s\n', $mysqli->error);
}
?>
