<?php
include '../connection.php';
session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
$conne ="";
if (isset($_POST['con_admin']))
{
if (!isset($_POST['mail']))
	echo "Do not forget to write your email address";
else if (!isset($_POST['passwd']))
	echo "Do not forget to write your password";
else
{
	$passwd = hash("whirlpool", $_POST['passwd']);
	echo $passwd;
	$mail = mysqli_real_escape_string($link, $_POST['mail']);
	$query = 'SELECT login,mdp FROM admin WHERE login="'.$mail.'" AND mdp="'.$passwd.'"';
	$array = mysqli_query($link, $query);
	echo $query;
	if (mysqli_fetch_assoc($array) === NULL)
	{
		$conne = "Invalid email or Invalid password, try again";
	}
	else
	{
		$conne = "OK";
		$_SESSION['admin'] = $_POST['mail'];
		header("Location: home.php");
	}
}
}
?>
<form id="create-account_form" class="std" method="post" action="index.php">
	<fieldset>
		<h3>Log in</h3>
		<?php   
		if(isset($conne))
		{
			if ($conne !== "OK")
				echo "<span class='error'> $conne </span>";
				
		}
	?>
		<div class="labele">
		<label for="email">Login : </label><input id="email" type="text" name="mail" /> <br>
		<label for="passwd">Password: </label><input id="passwd" type="password" name="passwd" /> <br>
		<input type="submit" class="submit" value="log in" name="con_admin">
		</div>
	</fieldset>
</form>
</body>
</html>