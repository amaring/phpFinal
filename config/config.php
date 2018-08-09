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
  
  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root (eg. http://myapp.com or http://localhost/myapp)
  define('URLROOT', 'http://DB_HOST/our_site_name');
  // Site Name
  define('SITENAME', 'OUR_SITE_NAME');
  
  //Encrypt / Decrypt functions
    /*
     * Function to Encrypt sensitive data for storing in the database
     *
     * @param string	$value		The text to be encrypted
	 * @param 			$encodeKey	The Key to use in the encryption
     * @return						The encrypted text
     */
	function encryptIt($value) {
		// The encodeKey MUST match the decodeKey
		$encodeKey = 'oDJWzonpRUVBOJmtSufjjT26KmH6c8Zn';
		$encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($encodeKey), $value, MCRYPT_MODE_CBC, md5(md5($encodeKey))));
		return($encoded);
	}

    /*
     * Function to decrypt sensitive data from the database for displaying
     *
     * @param string	$value		The text to be decrypted
	 * @param 			$decodeKey	The Key to use for decryption
     * @return						The decrypted text
     */
	function decryptIt($value) {
		// The decodeKey MUST match the encodeKey
		$decodeKey = 'oDJWzonpRUVBOJmtSufjjT26KmH6c8Zn';
		$decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($decodeKey), base64_decode($value), MCRYPT_MODE_CBC, md5(md5($decodeKey))), "\0");
		return($decoded);
	}


 ?>