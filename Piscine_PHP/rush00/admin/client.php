<?php
include 'template/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=add_client.php class='button add'>Add a client
	</a></section>";
$query = mysqli_query($link, "SELECT * FROM `client`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<strong><a href=modify_users.php?id=";
	echo $array['id'];
	echo ">";
		echo "</strong>";
	echo $array['email'];
	echo "</a>";
	echo "<p>";
	echo $array['name'];
	echo "</p>";
	echo "<p>";
	echo $array['firstname'];
	echo "</p>";	
	echo "<p>";
	echo $array['address'];
	echo "</p>";	
	echo "<p>";
	echo $array['code_postal'];
	echo "</p>";	
	echo "<p>";
	echo $array['city'];
	echo "</p>";	
	echo "<p>";
	echo $array['telephone'];
	echo "</p>";

	echo "</section>";
}
?>

</div>