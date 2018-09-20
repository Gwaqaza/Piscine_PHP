<?php
include ('template/header.php');


$sql = "SELECT id FROM order";
$array = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($array))
{
	$id = $row['id'];
	$sql = "SELECT client.name AS client_name, product.name AS product_name, W, client_order.price AS price_unit, order.price AS price_to, address, city, code_postal, telephone, firstname 
	FROM client_order, client, product, order WHERE order.id=$id AND client_order.id_order = $id AND client_order.id_product=product.id AND client.id = order.id_client ";
	$array_sql = mysqli_query($link, $sql);
	echo "<section><table>";
	$i = 1;
	echo "<tr><td class='th'>Firstname</td><td class='th'>Name</td><td class='th'>address</td><td class='th'>Postal Code</td><td class='th'>City</td><td class='th'>Telephone</td></tr>";
	while ($rowe = mysqli_fetch_assoc($array_sql)) 
	{
		if ($i == 1)
		{
			$total = $rowe['price_to'];
			echo "<tr>";
			echo "<td>";
			echo $rowe['firstname'];
			echo "</td><td>";
			echo $rowe['client_name'];
			echo "</td><td>";
			echo $rowe['address'];
			echo "</td><td>";
			echo $rowe['code_postal'];
			echo "</td><td>";
			echo $rowe['city'];
			echo "</td><td>";
			echo $rowe['telephone'];
			echo "</td>";
			echo "</tr>";
			echo "<tr class='th'><td>Product</td><td>Quantity</td><td>Unit price</td><td>Total Price</td></tr>";
			$i++;
		}
		echo "<tr><td>";
		echo $rowe['product_name'];
		echo "</td><td>";
		echo $rowe['amount'];
		echo "</td><td>";
		echo $rowe['price_unit'].'€';
		echo "</td><td>";
		echo ($rowe['amount'] * $rowe['price_unit']).'€';

	}


	echo "</tr><tr class='th price_to'><td>Price total</td><td colspan='3'>";
	echo $total.'R';
	echo "</td></tr></table></section>";

}

?>