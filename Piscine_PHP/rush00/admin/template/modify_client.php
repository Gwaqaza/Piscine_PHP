<?php
function check_potential_error()
{
	include ('../connection.php');

	if (strlen($_POST['passwd']) < 6)
	{
		if ($_POST['passwd'] != "")
		{
			$err_enre =  "Please enter a minimum of six characters";
			return ("Please enter a minimum of six characters");
		}
	}
	if (!preg_match("/^.+@.+\..+$/", $_POST['mail']))
	{
		$err_enre =  "Please enter a valid email address";
		return ("Please enter a valid email address");
	}
	if (!preg_match("/^[0-9]+(-[0-9]+)?$/", $_POST['postal_code']))
	{
		$err_enre =  "Please enter a valid postcode";
		return ("Please enter a valid postcode");
	}
	if (!preg_match("/^[0-9]+.+\s+.+\s+.+$/", $_POST['address']))
	{
		$err_enre =  "Please enter a valid address";
		return ("VPlease enter a valid address");
	}
	if (isset($_POST['phone']) && !preg_match("/^\+?[0-9]+$/", $_POST['phone']))
	{
		$err_enre =  "Please enter a valid number";
		return ("Please enter a valid number");
	}
	return (TRUE);
}

if (isset($_POST['modify']))
{


	if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['passwd'])
		|| !isset($_POST['address']) || !isset($_POST['postal_code'])
		|| !isset($_POST['mail'])|| !isset($_POST['city']))
	{
					echo "lol";
			$err_enre = "Do not forget to fill in the required fields";
		}
	else
	{

		if (check_potential_error() === TRUE)
		{

			$id = mysqli_real_escape_string($link, $_GET['id']);
			$name = mysqli_real_escape_string($link, $_POST['lname']);
			$mail = mysqli_real_escape_string($link, $_POST['mail']);
			$firstname = mysqli_real_escape_string($link, $_POST['fname']);
			$city = mysqli_real_escape_string($link, $_POST['city']);
			$adress = mysqli_real_escape_string($link, $_POST['address']);
			$code_postal = mysqli_real_escape_string($link, $_POST['postal_code']);
			$telephone = mysqli_real_escape_string($link, $_POST['phone']);
			if ($_POST['passwd'] !== "")
			{
				$passwd = hash("whirlpool", $_POST['passwd']);
				$sql = "UPDATE client SET email='$mail'  , name='$name' , firstname='$firstname', mdp='$passwd', adress='$adress', code_postal='$code_postal', city='$city', telephone='$telephone' WHERE id='$id'";
			}
			else
			{
				$sql = "UPDATE client SET email='$mail'  , name='$name' , firstname='$firstname', adress='$adress', code_postal='$code_postal', city='$city', telephone='$telephone' WHERE id='$id'";
			}
				if (mysqli_query($link, $sql) === TRUE)
					$err_enre = "Your customer has been modified";
				else
					$err_enre = "An error has occurred";


		}
		else
			$err_enre = check_potential_error();
	}
}
if (isset($_POST['delete']))
{
$id = mysqli_real_escape_string($link, $_GET['id']);
	$sql = "DELETE FROM client WHERE id=$id";
	
	mysqli_query($link, $sql);
	header("Location:client.php");
}

?>