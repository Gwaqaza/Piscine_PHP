<?php
include 'template/header.php';
include ('template/add.php');

?>
<div class="form admin_form">

	<form action="add.php" method="post">
		<fieldset>
			<h3>Add category</h3>
			<?php if(isset($err)) echo "<span class'succ'>$err</span>"; ?>
			<div class="labele">
				<label for="name">Name : </label><input type="text" name="name" value="" /> <br>
				<input type="submit" name="Adding" value="Add category" />
			</div>
		</fieldset>
	</form>
</div>
<?php

?>