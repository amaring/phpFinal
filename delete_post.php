<?php
// Connect to server and select database
$query = "DELETE MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
$result = mysqli_query($mysqli, $query) or die('-1'.mysqli_error());
$rows = mysqli_fetch_array($result);

// subtract - 1 to highest answer number and keep it in variable name $Max_id : if there is no answer yet, set it to 1
if ($rows) {
    $Max_id = $rows['Maxa_id']-1;
} else {
    $Max_id = 1;
}