<?
	include("includes/db.php");
	include("includes/functions.php");

	
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<img src="images/Images/Logo.jpg"/>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
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
<td><b><font face="comic sans ms" size="10" color="#ff99e1">Shopping Cart</font></b></td>
</tr>
</table>
<br>
<br>
<br>

<font face="comic sans ms" size="5">
<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto;>
    	<div style="color:#fef3bf"><?=$msg?></div>
    	<table border="1" cellpadding="5px" cellspacing="1px" background-color:#fef3bf" width="100%">
    	<?
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#fef3bf" style="font-weight:bold"><td>ID</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
                                        $Quantity['qty'];
					$pname=get_product_name($pid);
					if($q==0) continue;
			?>
            		<tr bgcolor="#fef3bf"><td><?=$i+1?></td><td><?=$pname?></td>
                    <td>&pound; <?=get_price($pid)?></td>
                    <td><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" /></td>                    
                    <td>&pound; <?=get_price($pid)*$q?></td>
                    <td><a href="javascript:del(<?=$pid?>)">Remove</a></td></tr>
            <?					
				}
			?>

				<tr><td><b>Order Total: &pound;<?=get_order_total()?></b></td><td colspan="5" align="right"><input type="button" value="Continue Shopping" onclick="window.location='products.php'"/><input type="button" value="Clear Cart" onclick="clear_cart()"><input type="button" value="Update Cart" onclick="update_cart()"><input type="button" value="Place Order" onclick="window.location='billing.php'"></td></tr>
			<?
            }
			else{
				echo "<tr bgColor='#fef3bf'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
    </div>
</div>
</form>
</body>
</font>
</html>