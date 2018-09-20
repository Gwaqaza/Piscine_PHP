<?PHP
include ("connection.php");
$query = mysqli_query($link, "SELECT * FROM `product` ORDER BY RAND() LIMIT 5");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<a href=single.php?id=";
		echo $array['id'];
	echo ">";
	echo '<img src=';
	echo $array['image'];
	echo "></a>";
	echo "<p class='product'><a href=single.php?id=";
	echo $array['id'];
	echo ">";
	echo $array['name']."</a></p>";
	echo "<p class='price'>".$array['price']."</p>";
	echo "</section>";
}
?>
