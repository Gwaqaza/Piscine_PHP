<?php
include 'template/header.php';
include ('template/modify.php');

	if (isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$query = 'SELECT * FROM product WHERE id="'.$id.'"';
		$array = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($array);

		$query_cat = 'SELECT * FROM categories';
		$array_cat = mysqli_query($link, $query_cat);
		$query_cat_prod = "SELECT * FROM categories_products, product, categories WHERE product.id = id_produit AND product.id = $id AND categories.id = categories_products.id_categories";
		$array_cat_prod = mysqli_query($link, $query_cat_prod);
		$row_cat = mysqli_fetch_assoc($array_cat_prod);
	if (empty($row))
	{
		echo "<span class='error'>An error has occurred, please come back</span>";
	}
	else
	{
?>
<div class="form admin_form">

	<form action="modify.php?id=<?php echo $_GET['id']; ?>" method="post">
		<fieldset>
			<h3>Edit account</h3>
			<div class="labele">
		<img src="../<?php echo $row['image']; ?>" alt="">
		<label for="name">Product Name: </label><input type="text" name="name" value="<?php echo $row['name'];?>" /> <br>
		<label for="price">Price : </label> <input type="text" name="price" value="<?php echo $row['price'] ?>"> <br>
<?php while ($po = mysqli_fetch_assoc($array_cat)) { 
		if ($row_cat['id_categories'] == $po['id'])
		{
		$row_cat = mysqli_fetch_assoc($array_cat_prod);
?>
		 <INPUT type="checkbox" name="cate[]" value="<?php echo $po['id']; ?>" checked> <?php echo $po['name']; ?> <br>
<?php 
} 
else
{
?>
<INPUT type="checkbox" name="cate[]" value="<?php echo $po['id']; ?>"> <?php echo $po['name']; ?> <br>
	<?php
}
}
	?>
		<input type="submit" name="modify" value="Edit product" />
		<input type="submit" name="delete" value="Remove product" />
	</div>
		</fieldset>
	</form>
</div>
<?php
	}
	}
	else{
		echo "<span class='error'>An error has occurred, please come back</span>";
	}

?>