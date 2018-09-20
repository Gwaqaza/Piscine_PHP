<ul class="menu">
	<div class="wrapper">
<?php
	$result = mysqli_query($link, "SELECT * FROM categories");
 	while ($row = mysqli_fetch_assoc($result)) {
 		echo "<li><a href=categories.php?id=";
		echo $row['id'];
 		echo ">";
 		echo $row['name'];
 		echo "</a></li>";
 	}
?>
	</div>
</ul>