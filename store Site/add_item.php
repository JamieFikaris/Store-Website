<?php
include("includes/db.php");
if (isset($_POST['save_item'])) {
$name=$_POST['name'];
$description=$_POST['description'];
$price=$_POST['price'];
$number_in_stock=$_POST['number_in_stock'];
$reorder_level=$_POST['reorder_level'];

//upload image script
    while(list($key,$value) = each($_FILES[image][name]))
	{
	  if(!empty($value))
	  {
		$image = $value;
		$add = "images/Images/$image";
		copy($_FILES[image][tmp_name][$key], $add);
		chmod("$add",0777);
		
	  }
	}

$result=mysql_query("INSERT INTO products VALUES ('','$name','$description','$price','images/Images/$image','$number_in_stock','$reorder_level')");

//check if this has happened
if (!$result) { echo mysql_error(); }


header ('location: products.php');


}//end if
?>

<img src="images/Images/Logo.jpg"/>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Item</title>

</head>


<body>


<style>
body {
	background: #dfe9ff;
}

#container {
	top: 50%;
	left: 0;
	width: 100%;
	height: 1px;
}

#table {
	background: #b2b2b2;
	width: 900px;
	height: 30px;
	border: 5px solid #999;
	top: -230px;
	left: 50%;
	margin-left: -460px;
	overflow: relative;
	padding: 5px;
	text-align: center;
}


#box {
	background: #fef3bf;
	width: 900px;
	height: 1250px;
	border: 5px solid #999;
	top: 20px;
	left: 50%;
	margin-left: -459px;
	overflow: relative;
	padding: 5px;
	text-align: center;
}

#bar1 {
        background: #000000;
        height: 1px;
        top: -140px;
        margin-left: 20px;
        margin-right: 20px;

}

#bar2 {
        background: #000000;
        height: 1px;
        top: 370px;
        margin-left: -5px;
        margin-right: -5px;

}

</style>

<div style="height: 80%;"></div>
<div id="container" style="position: absolute;">
<div id="table" style="position: relative;">
<table border="0">
<td width="100%"></td>
<td><a href="products.php"><button>Back</button></td>
</table>

<div style="height: 80%;"></div>
<div id="container" style="position: absolute;">
<div id="box" style="position: relative;">

<table align="center">
<tr>
<td><b><font face="comic sans ms" size="10" color="#ff99e1">Add Item</font></b></td>
</tr>
</table>

<br>
<br>
<br>
<center>
<table border="0" width="50%">
<tr>
<form method=post action="add_item.php" enctype="multipart/form-data">

<td>Item Name:</td><td> <input type="text" name="name"></td>
</tr>
<td>
Description:</td><td> <input type="text" name="description"></td>
</tr>
<tr>
<td>Price:</td><td><input type="text" name="price"></td>
</tr>
<tr>
<td>
Add Image: (200x159)</td> <td><input type="file" name='image[]'></td>
</tr>
<tr>
<td>
Stock Level:</td><td><input type="text" name="number_in_stock"></td>
</tr>
<tr><td>
Re Order Level:</td><td><input type="text" name="reorder_level"></td>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td>
<input type="submit" value="Save" name="save_item"></td>
</tr>
</table>
</center>
</form>

</body>
</html>