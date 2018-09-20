<?php
	if (isset($_POST['modify']))
	{
		$name = $_POST['name'];
		if ($name === "")
		{
			$err = "Please enter a valid name";
		}
		else
		{
			$id = $_GET['id'];
			$name = mysqli_real_escape_string($link, $name);
			if ((mysqli_query($link, "UPDATE categories SET name='$name' WHERE id='$id'")) === TRUE)
				$err = "Modified category";
			else
				$err ="Please restart";

		}
	}
	if (isset($_POST['delete']))
	{
			$id = $_GET['id'];
			$name = mysqli_real_escape_string($link, $name);
			mysqli_query($link, "DELETE FROM categories WHERE id='$id'");
			header("Location:categories.php");
	}
?>