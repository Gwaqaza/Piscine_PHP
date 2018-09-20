<?php
include 'template/header.php';
include ('template/add_client.php');

?>
<div class="form admin_form">

	<form action="add_client.php" method="post">
		<fieldset>
			<h3>Add category</h3>
			<?php if(isset($err_enre)) echo "<span class'succ'>$err_enre</span>"; ?>
			<div class="labele">
				<label for="name">Email : </label><input type="text" name="mail" value="" /> <br>
				<label for="name">Name : </label><input type="text" name="fname" value="" /> <br>
				<label for="name">Firstname : </label><input type="text" name="lname" value="" /> <br>
				<label for="name">Password : </label><input type="text" name="passwd" value="" /> <br>
				<label for="name">Adress : </label><input type="text" name="postal_code" value="" /> <br>
				<label for="name">Postal Code : </label><input type="text" name="address" value="" /> <br>
				<label for="name">City : </label><input type="text" name="city" value="" /> <br>
				<label for="name">Telephone : </label><input type="text" name="phone" value="" /> <br>
				<input type="submit" name="register" value="Add category" />
			</div>
		</fieldset>
	</form>
</div>
<?php

?>