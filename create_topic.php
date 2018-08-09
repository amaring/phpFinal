<?php
include_once('templates/header.php');
?>
<form class="reply_form" id="form1" name="form1" method="post" action="add_topic.php">
<h1>Create New Topic</h1>
<label for="topic">Topic</label>
<input name="topic" type="text" id="topic" /><br />
<label for="detail">Detail</label>
<textarea name="detail" d="detail"></textarea><br />
<label for="name">Name</label>
<input name="name" type="text" id="name" value="<?php if (isset ($_SESSION['u_first'])) echo ($_SESSION['u_first']); ?>" /><br />
<label for="email">Email</label>
<input name="email" type="text" id="email" value="<?php if (isset ($_SESSION['u_email'])) echo ($_SESSION['u_email']); ?>"/><br />
<input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
</form>
<?php
include_once('templates/footer.php');
?>