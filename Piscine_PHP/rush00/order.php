<?php
include ('template/header.php');
if (isset($_POST['sacafoutre']))
{
$email = $_SESSION['loggued_on_user'];
$sql = "SELECT id FROM client WHERE email='$email'";
$array = mysqli_query($link, $sql);
$id = mysqli_fetch_assoc($array);
$ide = $id['id'];
$total = $_SESSION['total'];
$sql = "INSERT INTO order(id_client, price) VALUES('$ide', '$total')";
mysqli_query($link, $sql);
$lst_id = mysqli_insert_id($link);
foreach ($_SESSION['cart'] as $key => $value) 
{
	$sql = "SELECT id FROM product WHERE name='$key'";
	$array = mysqli_query($link, $sql);
	$id = mysqli_fetch_assoc($array);
	$id = $id['id'];
	$price = $value['price'];
	$quantity = $value['quantity'];
	$sql = "INSERT INTO client_order(id_product, id_order, price, quantity) VALUES ('$id', '$lst_id', '$price', '$quantity')";
	mysqli_query($link, $sql);
}
$_SESSION['cart'] = NULL;
}

header("Location:index.php");

?>