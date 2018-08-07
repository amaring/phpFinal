<?php
include_once('templates/header.php');

$tbl_name="forum_answer"; // Table name

// Get value of id that sent from hidden field
$id=$_POST['id'];

// Find highest answer number.
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id';";
$result = mysqli_query($mysqli, $sql) or die('-1'.mysqli_error());
$rows=mysqli_fetch_array($result);
print $rows['Maxa_id'];

// add + 1 to highest answer number and keep it in variable name "$Max_id". if //there no answer yet set it = 1
if (is_null($rows)) {
$Max_id = 1;
} else {
$Max_id = $rows['Maxa_id']+1;
}

// get values that sent from form
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=addslashes($_POST['a_answer']); //Might want to swap for http://php.net/manual/en/mysqli.real-escape-string.php 

$datetime=date("d/m/y H:i:s"); // create date and time


// Insert answer
$sql2 = "INSERT INTO `$tbl_name` (`question_id`, `a_id`, `a_name`, `a_email`, `a_answer`, `a_datetime`) VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime');";
if (mysqli_query($mysqli, $sql2)) {
    echo "<p class='success'>New record created successfully<br/><a href='view_topic.php?id=$id'>View your answer here</a></p>";
} else {
    echo "<p class='error'>Error: " . $sql2 . "<br>" . mysqli_error($mysqli) . "</p>";
}

// If added new answer, add value +1 in reply column
$tbl_name2="forum_question";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
$result3 = mysqli_query($mysqli, $sql3) or die('-1'.mysqli_error());

include_once('templates/footer.php');
?>
