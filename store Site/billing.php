<?

session_start();

	include("includes/db.php");
	include("includes/functions.php");

	if($_REQUEST['command']=='update'){
		$firstname=$_REQUEST['firstname'];
                $surname=$_REQUEST['surname'];
		$addressline1=$_REQUEST['addressline1'];
                $addressline2=$_REQUEST['addressline2'];
                $postcode=$_REQUEST['postcode'];
                $country=$_REQUEST['country'];
                $email=$_REQUEST['email'];
		$phone=$_REQUEST['phone'];

		$result=mysql_query("insert into customers values('','$firstname','$surname','$addressline1','$addressline2','$postcode','$country','$email','$phone')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();

$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
		}

die('Thank You! Your order has been placed and your items will be delivered in the next 3-5 working days!');
	}
?>


<img src="images/Images/Logo.jpg"/>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing Info</title>
<script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
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
<td><a href="shoppingcart.php"><button>Back</button></td>
</table>

<div style="height: 80%;"></div>
<div id="container" style="position: absolute;">
<div id="box" style="position: relative;">

<table align="center">
<tr>
<td><b><font face="comic sans ms" size="10" color="#ff99e1">Billing</font></b></td>
</tr>
</table>
<br>
<br>
<br>

<form name="form1" onsubmit="return validate()">
    <input type="hidden" name="command" />
<center>
        <table border="1">
        	<tr><td>Order Total: </td><td>&pound; <?=get_order_total()?></td></tr>
            <tr><td>First Name:</td><td><input type="text" name="firstname" /></td></tr>
            <tr><td>Surname:</td><td><input type="text" name="surname" /></td></tr>
            <tr><td>Address Line 1:</td><td><input type="text" name="addressline1" /></td></tr>
            <tr><td>Address Line 2:</td><td><input type="text" name="addressline2" /></td></tr>
            <tr><td>Postcode:</td><td><input type="text" name="postcode" /></td></tr>
            <tr><td>Country:</td><td><input type="text" name="country" /></td></tr>
            <tr><td>Email:</td><td><input type="text" id="email" name="email" /></td></tr>
            <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
        </table>
</center>
	</div>
</form>
</body>
</html>		