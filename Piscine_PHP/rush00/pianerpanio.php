<?PHP
include ('connection.php');

if (!isset($_POST['addtocart']) || !isset($_GET['id']) || $_GET['id'] === "")
	return (0);
if (!isset($_POST['quantity']) || !is_numeric($_POST['quantity'])
	|| $_POST['quantity'] <= 0 || !preg_match("/^[0-9]+$/", $_POST['quantity']))
{
	echo "Please give us a consistent amount ...";
	return (0);
}
$query = 'SELECT id,name,price FROM product WHERE id="'.$_GET['id'].'"';
$array = mysqli_query($link, $query);
if (($array = mysqli_fetch_assoc($array)) === NULL)
{
	echo "The product you have requested is no longer assigned, your request can not be completed";
	return (0);
}
if (!array_key_exists('cart', $_SESSION) || $_SESSION['cart'] === NULL)
{
	$_SESSION['cart'][$array['name']]['price'] = $array['price'];
	$_SESSION['cart'][$array['name']]['quantity'] = $_POST['quantity'];
}
else
{
	if (!array_key_exists($array['name'], $_SESSION['cart']))
	{
		$_SESSION['cart'][$array['name']]['price'] = $array['price'];
		$_SESSION['cart'][$array['name']]['quantity'] = $_POST['quantity'];
	}
	else
	{
		$_SESSION['cart'][$array['name']]['quantity'] += $_POST['quantity'];
	}
}
?>
