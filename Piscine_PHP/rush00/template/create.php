<?PHP
	include ('connection.php');
if (isset($_POST['register']))
{
function check_potential_error()
{
	include ('connection.php');

	if (strlen($_POST['passwd']) < 6)
	{
		$err_enre =  "Please enter a minimum of six characters";
		return ("Please enter a minimum of six characters");
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
		return ("Please enter a valid address");
	}
	if (isset($_POST['phone']) && !preg_match("/^\+?[0-9]+$/", $_POST['phone']))
	{
		$err_enre =  "Please enter a valid number";
		return ("Please enter a valid number");
	}
	$query = mysqli_query($link, "SELECT * FROM `client`");
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	{
		if ($array['email'] === $_POST['mail'])
		{
			$err_enre =  "This account already exists";
			return ("This account already exists");
		}
	}
	return (TRUE);
}

if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['passwd'])
	|| !isset($_POST['address']) || !isset($_POST['postal_code'])
	|| !isset($_POST['mail'])|| !isset($_POST['city']))
	$err_enre = "Do not forget to fill in the required fields";
else
{
	if (check_potential_error() === TRUE)
	{
		$stmt = mysqli_prepare($link, "INSERT INTO client(email, name, firstname, mdp, address, code_postal, ville, telephone) 
			VALUES (?, ?, ?, ?, ?, ? ,? ,?)");
		$bind = mysqli_stmt_bind_param($stmt, "ssssssss", $_POST['mail'], $_POST['lname'], $_POST['fname'], 
			hash("whirlpool", $_POST['passwd']), $_POST['address'], $_POST['postal_code'], $_POST['city'], $_POST['phone']);
		$exec = mysqli_stmt_execute($stmt);

	$err_enre = TRUE;
	}
	else
		$err_enre = check_potential_error();
}
}
?>