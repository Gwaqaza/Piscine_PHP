<?php

if(isset($_POST['submit'])) // the form was submitted with the [Send] button
{
	$content_dir = '../img/'; // folder where the file will be moved
	$file1 = $_FILES['ufile']['name'][0];
	if(empty($file1))
	{
   		echo 'error';	
	}
   	else
   	{
   		$tmp_file = $_FILES['ufile']['tmp_name'][0];
 	 	if (!is_uploaded_file($tmp_file))
  	 	{
   			exit("The files can not be found");
   		}
   		$type_file = $_FILES['ufile']['type'][0];
   		if( !strstr($type_file, 'png') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
   		{
   			exit("The file is not an image");

   		}
   		$name_file = $_FILES['ufile']['name'][0];
   		if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file) )
   		{
   			exit("Invalid file name");
   		}
   		if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
   		{
   			exit("Unable to copy the file in $content_dir");
   		}
    	$dirbdd = '../img/' . $name_file; // folder where the file will be moved
		$dirbdd2 = 'img/' . $name_file;
    	echo "The file has been uploaded";
		  $catego =  $_POST['cate'];
   		$title = mysqli_real_escape_string($link, $_POST['name']);
   		$price = mysqli_real_escape_string($link, $_POST['price']);
   		$descr = mysqli_real_escape_string($link, $_POST['descr']);
   		$sql = "INSERT INTO product(name, image, price, description) VALUES ('$title', '$dirbdd2', '$price', '$descr')";
   		mysqli_query($link, $sql);
   		$lst_id = mysqli_insert_id($link);
   		foreach ($catego as $key) 
   		{
			$key_s = mysqli_real_escape_string($link, $key);
			$sqle = "INSERT INTO categories_products(id_product, id_categories) VALUES ('$lst_id', '$key_s')";
			mysqli_query($link, $sqle);
   		}
	}
}
?>