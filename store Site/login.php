<?php 
session_start();

if (isset($_POST['login'])){

	if ($_POST['password']=="jfj437e9odj") {

		$_SESSION['logged_in']=true;
		header('location:products.php');

	}
	else {

		echo "<script>alert('Password incorrect')</script>";

	}

}

if (isset($_POST['cancel'])){

header('location:products.php');
}

?>

<img src="images/Images/Logo.jpg"/>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>


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

<div style="height: 80%;"></div>
<div id="container" style="position: absolute;">
<div id="box" style="position: relative;">

<table align="center">
<tr>
<td><b><font face="comic sans ms" size="10" color="#ff99e1">Log In</font></b></td>
</tr>
</table>
<br>
<br>
<br>

<font face="comic sans ms" size="5" color="#000000">
<center>
<table border="0">
<tr>
<FORM METHOD="POST" ACTION="login.php">
 
<p><b>Enter Your Login Details:<b><br>
</tr>
<tr>
<td>
Username: </td><td><input type="text" name="username"> </tr><tr></td><td>
Password: </td><td><input type="password" name="password"> </td>
</tr>
</table>
<table border=0>
<tr>
</font>
<td width="35%"><td><input type="SUBMIT" name="login" value="Login"></td><td>
<input type="SUBMIT" name="cancel" value="Cancel"> 
</FORM> 
</td>
</tr>
</table>
</center>
</div>
</body>
</html>