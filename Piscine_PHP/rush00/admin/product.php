<?php
include 'template/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=add.php class='button adding'>Add product</a></section>";
$query = mysqli_query($link, "SELECT * FROM `product`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<a href=modify.php?id=";
		echo $array['id'];
	echo ">";
	echo '<img src=../';
	echo $array['image'];
	echo "></a>";
	echo "<p class='product'><a href=modify.php?id=";
	echo $array['id'];
	echo ">";
	echo $array['name']."</a></p>";
	echo "<p class='price'>".$array['price']."</p>";
	echo "</section>";
}
?>

</div>