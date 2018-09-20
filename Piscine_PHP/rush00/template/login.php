<?PHP
include ('../connection.php');
if (isset($_POST['conne']))
{
if (!isset($_POST['mail']))
	echo "Do not forget to write your email address";
else if (!isset($_POST['passwd']))
	echo "Do not forget to write your password";
else
{
	$passwd = hash("whirlpool", $_POST['passwd']);
	$mail = mysqli_real_escape_string($link, $_POST['mail']);
	$query = 'SELECT email,mdp FROM client WHERE email="'.$mail.'" AND mdp="'.$passwd.'"';
	$array = mysqli_query($link, $query);
	if ( mysqli_fetch_assoc($array) === NULL)
	{
		$conne = "Invalid email or Invalid password, try again";
	}
	else
	{
		$_SESSION['loggued_on_user'] = $_POST['mail'];
		header("Location: index.php");
	}
}
}
?>
