<?php
if (isset($_POST['modify']))
{
	if (!isset($_POST['price']) || !is_numeric($_POST['price'])
	|| $_POST['price'] <= 0 || !preg_match("/^[0-9]+(\.[0-9][0-9]?)?$/", $_POST['price']))
	{
		echo "Please enter a correct price, thank you";
	}
	elseif ($_POST['name'] === "")
	{
		echo "Please enter a correct name, thank you";
	}
	else
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$price = mysqli_real_escape_string($link, $_POST['price']);
		$sql = "UPDATE product SET price='$price', name='$name' WHERE id = $id";
		mysqli_query($link, $sql);

		mysqli_query($link, "DELETE FROM categories_products WHERE id_product=$id");
		foreach ($_POST['cate'] as $key) {
			$key_s = mysqli_real_escape_string($link, $key);
			$sqle = "INSERT INTO categories_products(id_product, id_categories) VALUES ('$id', '$key_s')";
			mysqli_query($link, $sqle);
		}
	}

}
elseif (isset($_POST['delete']))
{
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$sql = "DELETE FROM product WHERE id=$id";
	mysqli_query($link, $sql);
	echo $sql;
}
?>

