<?php
include 'template/header.php';
include ('template/file.php');
$query_cat = 'SELECT * FROM categories';
$array_cat = mysqli_query($link, $query_cat);
?>
<div class="form">
<form action="add.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="labele">
		<label for="name">Product Name: </label><input type="text" name="name" value="" /> <br>
		<label for="price">Price : </label> <input type="text" name="price" value=""> <br>
		

		<label for="descr">Description : </label> <textarea type="textarea" name ="descr" rows="4" cols="50"/> </textarea><br>
		 <input type="hidden" name="MAX_FILE_SIZE" value="99999999999">
<label for=""> Image : </label><input name="ufile[]" type="file" id="ufile[]" size="50" /> <br>
<label>Categories  :</label> <br>
<?php while ($po = mysqli_fetch_assoc($array_cat)) { ?>
<INPUT type="checkbox" name="cate[]" value="<?php echo $po['id']; ?>"> <?php echo $po['name']; ?> <br>
<?php
}
?>

		<input type="submit" name="submit">
	</div>
	</fieldset>
</form>
</div>