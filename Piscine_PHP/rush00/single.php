<?php
include 'template/header.php';
if (isset($_GET['id']))
{
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$query = 'SELECT * FROM product WHERE id="'.$id.'"';
	$array = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($array);
	if (empty($row))
	{
		echo "<span class='error'>An error has occurred, please come back</span>";
	}
	else
	{
?>
<section class="title_product menu">
	<div class="wrapper">
		<h1><?php echo $row['name'] ?></h1>
	</div>
</section>
<div class="wrapper">
<div class="single_wr">
	<div class="frame">
		<img src="<?php echo $row['image']; ?>" alt="">
	</div>

	<div class="desc">
		<p class="description">
			<?php echo $row['description']; ?>
		</p>
		<p class="price">
			<?php echo $row['price']; ?>
		</p>
		<p class="add_to_carte">
			<p>Quantity :</p>
			<form action="single.php?id=<?php echo $_GET['id'];?>" method="post">
				<input type="text" name="quantity" class="quantity_single" value="1"/>
				<input class="addcart" type="submit" name="addtocart" value="Add to cart">
			</form>
		</p>
	</div>
	<div class="custom-block-product">
		<h3>Lorem Lipsum</h3>
		<p>
			<strong>Lorem</strong>
			<br>
			Aurum manibus pergunt aurum offertur ad haec tamen vel rogati.
		</p>
		<p>
			<strong>Lorem</strong>
			<br>
			Aurum manibus pergunt aurum offertur ad haec tamen vel rogati.
		</p>
		<p>
			<strong>Lorem</strong>
			<br>
			Aurum manibus pergunt aurum offertur ad haec tamen vel rogati.
		</p>
		<p>
			<strong>Lorem</strong>
			<br>
			Aurum manibus pergunt aurum offertur ad haec tamen vel rogati.
		</p>
		<p>
			<strong>Lorem</strong>
			<br>
			Aurum manibus pergunt aurum offertur ad haec tamen vel rogati.
		</p>
	</div>
</div>
<div class="clearboth"></div>

<?php
}
}
else{
	
}
include('template/footer.php');
?>