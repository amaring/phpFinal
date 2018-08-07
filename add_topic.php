<?php

include_once('templates/header.php');
include('config/config.php');
$tbl_name="forum_question"; // Table name

// get data that sent from form
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result = mysqli_query($mysqli, $sql) or die('-1'.mysqli_error());

if($result){
echo "Successful<BR>";
echo "<a href=forum.php>View your topic</a>";
}
else {
echo "ERROR";
}
//mysqli_close();

include_once('templates/footer.php');
?>
