<?php
	include ('template/header.php');
	include "template/create.php";
	include "template/login.php";

?>

<div class="form">
<form id="create-account_form" class="std" method="post" action="create.php">
	<fieldset>
		<h3>Create an account</h3>
		<?php   
		if(isset($err_enre))
		{
			if ($err_enre === TRUE)
				echo "<span class='succ'>Your account has been successfully created</span>";
			else
				echo "<span class='error'> $err_enre </span>";
				
		}
	?>
		<div class="labele">
		<label for="email">E-mail : </label><input id="email" type="email" name="mail" /> <br>
		<label for="fname">Firstname : </label><input id="fname" type="text" name="fname" /> <br>
		<label for="lname">Name : </label><input id="lname" type="text" name="lname" /> <br>
		<label for="passwd">Password : </label><input id="passwd" type="password" name="passwd" /> <br>
		<label for="postal_code">Postal Code : </label><input id="postal_code" type="text" name="postal_code" /> <br>
		<label for="adress">Address : </label><input id="adress" type="text" name ="address" /> <br>
		<label for="city">City : </label><input id="city" type="text" name ="city" /> <br>
		<label for="telephone">Telephone : </label><input id="telephone" type="telephone" name="phone"> <br>
		<input type="submit" class="submit" value="Create an account" name="register">
		</div>
	</fieldset>
</form>
</div>

<div class="form">
<form id="create-account_form" class="std" method="post" action="create.php">
	<fieldset>
		<h3>To log in</h3>
		<?php   
		if(isset($conne))
		{
				echo "<span class='error'>$conne</span>";
		}
		?>
		<div class="labele">
		<label for="email">E-mail : </label><input id="email" type="email" name="mail" /> <br>
		<label for="passwd">password: </label><input id="passwd" type="password" name="passwd" /> <br>
		<input type="submit" class="submit" name="conne" value="Log in">
		</div>
	</fieldset>
</form>
</div>