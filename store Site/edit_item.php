<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
header('location:products.php');

}


include("includes/db.php");


if (isset($_POST['save_item'])) {
$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$number_in_stock=$_POST['number_in_stock'];
$reorder_level=$_POST['reorder_level'];

$result=mysql_query("UPDATE products SET name='$name', price='$price',number_in_stock='$number_in_stock',reorder_level='$reorder_level' WHERE id='$id'");

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
<title>Edit Item</title>

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
<td><b><font face="comic sans ms" size="10" color="#ff99e1">Edit Item</font></b></td>
</tr>
</table>

<br>
<br>
<br>

<?php

$item_id=$_GET['item_id'];

//this line will get all of the fields from the stationery table
$result = mysql_query("SELECT * FROM products  where id=$item_id");


while ($myrow = mysql_fetch_array($result)) 
{

$id=$myrow["id"];
$name=$myrow["name"];
$price=$myrow["price"];
$number_in_stock=$myrow['number_in_stock'];
$reorder_level=$myrow['reorder_level'];
?>

<center>
<table border="0" width="35%">
<form method=post action=edit_item.php>

<td>Item Name: </td><td><input type="text" name="name" value="<?php echo $name; ?>"></td>
</tr><tr>
<td>Price:</td><td><input type="text" name="price" value="<?php echo $price; ?>"></td>
</tr><tr>
<td>Stock Level:</td><td><input type="text" name="number_in_stock" value="<?php echo $number_in_stock; ?>"></td>
</tr><tr>
<td>Re Order Level:</td><td><input type="text" name="reorder_level" value="<?php echo $reorder_level; ?>"></td></tr>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td>
<input type="submit" value="Save" name="save_item">
</td>
</tr>
</table>
</center>
</form>
<?php 
}
?>


</body>
</html>