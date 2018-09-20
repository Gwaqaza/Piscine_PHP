<?PHP
include ('template/header.php');
if (isset($_POST['delete']))
{
	$_SESSION['cart'] = NULL;
}
if (array_key_exists('cart', $_SESSION) && $_SESSION['cart'] !== NULL)
{
	$i = 0;
	$total = 0;
	?>
	<table>
	<thead>
		<th>Product</th>
		<th>Quantity</th>
		<th>Total Price</th>
		<th>Unit price</th>
	</thead>
	<?php
	foreach ($_SESSION['cart'] as $key => $value)
	{

		$price = $value['quantity'] * $value['price'];
		$total = $price + $total;
		?>
	<tr>
		<td><?php echo $key; ?></td>
		<td><?php echo $value['quantity']; ?></td>
		<td><?php echo $price; ?> R</td>
		<td><?php echo $value['price']; ?> €</td>
	</tr>
	<?php
	$_SESSION['total'] = $total;
	}
echo "</table>";
echo '<span class="total">Total : '.$total.'R</span>';
}
if (!isset($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] === "")
	echo "<a href='create.php' class='addcart button'>To log in</a>";
else
{
	if (array_key_exists('cart', $_SESSION) && $_SESSION['cart'] !== NULL)
	{
?>

<form action="order.php" method="POST">
	<input type="submit" name="sacafoutre" class='addcart button' value="order" />
</form>
<?php }?>
<form action="basket.php" method="POST">
	<input type="submit" name="delete" class='addcart button' value="Clear the basket" />
</form>
<?php
	echo "";
}
echo "<div class='clearfix'></div>";
include 'template/footer.php';
?>
