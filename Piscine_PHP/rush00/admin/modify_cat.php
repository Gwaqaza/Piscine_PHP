<?php
include 'template/header.php';
include ('template/modify_cat.php');

	if (isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$query = 'SELECT * FROM categories WHERE id="'.$id.'"';
		$array = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($array);
	if (empty($row))
	{
		echo "<span class='error'>An error has occurred, please come back</span>";
	}
	else
	{
?>
<div class="form admin_form">

	<form action="modify_cat.php?id=<?php echo $_GET['id']; ?>" method="post">
		<fieldset>
			<h3>Edit account</h3>
			<?php if(isset($err)) echo "<span class'succ'>$err</span>"; ?>
			<div class="labele">
		<label for="name">Category Name: </label><input type="text" name="name" value="<?php echo $row['name'];?>" /> <br>
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
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}

?>