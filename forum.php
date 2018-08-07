<?php 
	include('config/config.php');
	include_once 'templates/header.php';

// Get Data
	$query = "SELECT * FROM forum_question ORDER BY id DESC;";
    $res = mysqli_query($mysqli, $query) or die('-1'.mysqli_error());
	//$rows = $mysqli->query("SELECT * FROM forum_question ORDER BY id DESC;");
?>
<!-- html -->
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>

<!-- end html -->

<?php
// Start looping table row
while($rows=mysqli_fetch_array($res)){ ?>
<!-- html -->
<tr>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['id']; ?></td>
<td align="center" bgcolor="#FFFFFF"><a href="view_topic.php?id=<? echo $rows['id']; ?>"><? echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['datetime']; ?></td>
</tr>
<!-- end html -->

<!--<?php mysqli_close(); } ?> -->
<!-- end table -->
</table>


<?php if (isset($isAdmin)): ?>
	<!-- display crud functions -->
	<!-- update -->
	<button>update</button>;
	<!-- delete -->
	<button>delete comment</button>
<? else: ?>
	<!-- display normal user form -->
	<form>
		<h2>normal user form</h2>
		<p>create</p>
		<p>read</p>
	</form>
<?php endif; ?>

<?php include_once 'templates/footer.php'; ?>
