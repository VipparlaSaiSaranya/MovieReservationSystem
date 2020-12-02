<style>

.demo-table {
	background: #d9eeff;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
}
.demo-table td {
	padding: 10px 0px;
	font-size:20px;
	font-style:italic;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}

th{
	font-size:20px;
	font-style:italic;
}

td{
	font-size:20px;
	font-style:italic;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	font-size:20px;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
.btn-Register {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	font-size:18px;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
	margin-top: 10px;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
</style>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_SESSION['username']))
{
	header('location:logout1.php');
}
$user=$_SESSION['username'];
$name=$_GET['h'];
$thname=$_GET['i'];
$date=$_GET['j'];
$stime=$_GET['p'];
$seat1=$_GET['q'];
$amt=$_GET['v'];
if(!empty($_POST["submit"])) {
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "Account number is mandatory";
		break;
		}
	}
	if(!isset($error_message)){
	$num=$_POST['accnum'];
	$sql = "UPDATE bank SET bal=bal+$amt WHERE cardno='$num'";
	$conn->query($sql);
	$sql = "UPDATE bank SET bal=bal-$amt WHERE cardno='1234123412341234'";
	$conn->query($sql);
	$sql = "DELETE FROM bookdet WHERE mname='$name' and thname='$thname' and bdate='$date' and stime='$stime' and t1='$seat1'";
	$conn->query($sql);
	header('location:can3.php'); 
	}
}
?>
<table border="0" align="right">
<tr>
<td><?php echo "Welcome "; echo $user; ?></td>
<td><input type="button" class="btn-Register" value="Home" onclick="location.href='usoptions.php'"></td>
<td><input type="button" class="btn-Register" value="Logout" onclick="location.href='logout.php'"></td>
</tr>
</table>
<br>
<br>
<br>
<br>
<div> 
<form method="POST" action="">
<center>
<h1><i>Bank Details..</i></h1>
<table border="0" class="demo-table">
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>Account Number:</td>
<td><input class="demoInputBox" type="text" name="accnum" value=""></td>
</tr>
<tr>
<td align="center" colspan="2"><input class="btn-Register" type="submit" name="submit" value="Submit"></td>
</tr>
</form>
</center>
</div>