<?

session_start();

	include("includes/db.php");
	include("includes/functions.php");
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
	}
?>
<?

if (isset($_GET['delete'])){
$id=$_GET['delete'];
$result=mysql_query("DELETE FROM products WHERE id=$id");
header("location:products.php");
}//end if
?>


<img src="images/Images/Logo.jpg"/>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop</title>
<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
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
	width: 950px;
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
	width: 950px;
	height: 1300px;
	border: 5px solid #999;
	top: 20px;
	left: 50%;
	margin-left: -484px;
	overflow: auto;
	padding: 5px;
	text-align: center;
}

#bar1 {
        background: #000000;
        height: 1px;
        top: -145px;
        margin-left: 20px;
        margin-right: 20px;

}

</style>
<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

	
<div style="height: 80%;"></div>
<div id="container" style="position: absolute;">
<div id="table" style="position: relative;">
<table border="0">
<td width="100%"></td>
<td><a href="login.php"><button>Login</button></td>
<td><a href="shoppingcart.php"><button>Cart</button></td></td>
</table>

<div style="height: 80%;"></div>
<div id="container" style="position: absolute;">
<div id="box" style="position: relative;">

<table align="center">
<tr>
<td><b><font face="comic sans ms" size="10" color="#ff99e1">Shop</font></b></td>
</tr>
</table>

<br>
<br>
<font size="5" face="comic sans ms">
<table border="0" width="100%" height="80%">
<?
                        $counter=0;
			$result=mysql_query("select * from products");
			while($row=mysql_fetch_array($result)){
$counter++;
		
if($counter==5 OR $counter==9 OR $counter==13) {
echo "<tr>";

}
?>
<td>
<br>
<center>
<b><?=$row['name']?></b><br><br><img src="<?=$row['image']?>"/><br><br><?=$row['description']?><br>Price:<big style="color:black"> &pound;<?=$row['price']?></big><br><br>

<input type="button" value="Add to Cart" onclick="addtocart(<?=$row['id']?>)"/><br>
<?
if (isset($_SESSION['logged_in'])) {
?>
<a href="products.php?delete=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a> |

<a href="edit_item.php?item_id= <?php echo $row['id']; ?>">Edit</a> |

<a href="add_item.php">Add</a><br><br>
<div id=bar1>
<?php
}//end if session variable logged_in
}//end while
?>
</td>
</center>
</table>

</div>

</body>
</html>	