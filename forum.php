<?php 
	include_once 'templates/header.php';

// Get Data
	$query = "SELECT * FROM forum_question ORDER BY id DESC;";
    $res = mysqli_query($mysqli, $query) or die('-1'.mysqli_error());

?>
<!-- html -->
<table class="forum">
    <thead>
        <tr>
        <td>Topic</td>
        <td>Views</td>
        <td>Replies</td>
        <td>Date/Time</td>
        </tr>
    </thead>
    
<!-- end html -->
<tbody>
<?php
// Start looping table row
while($rows=mysqli_fetch_array($res)){ ?>
<!-- html -->
<tr>
<td><a href="view_topic.php?id=<? echo $rows['id']; ?>"><? echo $rows['topic']; ?></a><BR></td>
<td><? echo $rows['view']; ?></td>
<td><? echo $rows['reply']; ?></td>
<td><? echo $rows['datetime']; ?></td>
</tr>
<!-- end html -->

<!--<?php mysqli_close(); } ?> -->
<!-- end table -->
</tbody>
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
