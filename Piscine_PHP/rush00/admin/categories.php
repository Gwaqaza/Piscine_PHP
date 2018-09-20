<?php
include 'template/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=add.php class='button add'>Add a category</a></section>";
$query = mysqli_query($link, "SELECT * FROM `categories`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<p><a href=modify_cat.php?id=";
	echo $array['id'];
	echo ">";
	echo $array['name'];
	echo "</a>";
	echo "</p>";
	echo "</section>";
}
?>

</div>