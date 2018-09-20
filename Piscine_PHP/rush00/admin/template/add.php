<?php

function 	ft_duplicate($name)
{
	include ('../connection.php');
	$bo = TRUE;
	$select = "SELECT name FROM categories";
	$array = mysqli_query($link, $select);
	while ($row = mysqli_fetch_assoc($array)) 
	{
		if ($row['name'] === $name)
			$bo = FALSE;
	}
	return ($bo);
}

if(isset($_POST['ajout'])) // the form has been submitted with the send button
{
	if ($_POST['name'] != '')
	{
		$name = mysqli_real_escape_string($link, $_POST['name']);
		if (ft_doublon($name) === TRUE)
		{
			$sql = "INSERT INTO categories(name) VALUES ('$name')";
			mysqli_query($link, $sql);
			$err = "Add Categories";
		}
		else
		{
			$err = "Existing Categories";
		}
	}
	else
	{
		$err = "Please fill in a name";
	}
}
?>