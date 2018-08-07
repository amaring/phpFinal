<?php
include_once('templates/header.php');

$tbl_name = "forum_question"; // Table name

// get value of id that sent from address bar
$id = $_GET['id'];

	$sql = "SELECT * FROM ".$tbl_name." WHERE id='".$id."';";
	$res = mysqli_query($mysqli, $sql) or die('-1'.mysqli_error());

	$rows = mysqli_fetch_array($res);
?>

<div class="first_post">
<h2><? echo $rows['topic']; ?></h2>
<p><? echo $rows['detail']; ?></p>
<p class="posted">Posted by: <a href="mailto:<? echo $rows['email'];?>"><? echo $rows['name']; ?></a> on <? echo $rows['datetime']; ?>. </p>
</div>
<BR>

<?php

$tbl_name2="forum_answer"; // Switch to table "forum_answer"

$sql2="SELECT * FROM ".$tbl_name2." WHERE question_id='".$id."';";
$result2=mysqli_query($mysqli, $sql2) or die('-1'.mysqli_error());

while($rows=mysqli_fetch_array($result2)){
?>
<div class="post">
<p><? echo $rows['a_answer']; ?></p>
<p class="posted">Posted by: <a href="mailto:<? echo $rows['a_email'];?>"><? echo $rows['a_name']; ?></a> on <? echo $rows['a_datetime']; ?>. </p>
</div>
<br>

<?php
}

$sql3="SELECT view FROM ".$tbl_name." WHERE id='".$id."';";
$result3=mysqli_query($mysqli, $sql3) or die('-1'.mysqli_error());

$rows=mysqli_fetch_array($result3);
$view=$rows['view'];

// if you have no counter value set counter = 1
if($view < 1 ){
$view = 1;
} else { // add more counts
$view += 1;
}
$sql4="UPDATE $tbl_name SET view='$view' WHERE id='$id';";
$result4 = mysqli_query($mysqli, $sql4) or die('-1'.mysqli_error());
//mysqli_close();
?>

<br />
    <form class="reply_form" name="form1" method="post" action="add_answer.php">
    <label for="a_name">Name:</label>
    <input name="a_name" type="text" id="a_name" size="45"><br />
    <!-- Make these sticky forms -->
    <label for="a_email">Email:</label>
    <input name="a_email" type="email" id="a_email" size="45"><br />
    <label for"a_answer">Reply:</label>
    <textarea name="a_answer" cols="30" rows="3" id="a_answer"></textarea><br />
    <input name="id" type="hidden" value="<? echo $id; ?>">
    <input type="reset" name="Submit2" value="Reset"><input type="submit" name="Submit" value="Submit">

<?php
include_once('templates/footer.php')
?>
