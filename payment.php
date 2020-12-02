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
td{
	font-size:20px;
	font-style:italic;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
 
  </script>
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
if(!empty($_POST["submit"])) {
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	
	$name=$_POST['cname'];
	$num=$_POST['cno'];
	$cvv=$_POST['cvv'];
	$date=$_POST['exdate'];
	$date = date("Y-m-d", strtotime($date));
	$sql = "SELECT * FROM bank where cardno='$num' and name='$name' and cvv='$cvv' and expdate='$date'";
	$result = $conn->query($sql);
	if ($result->num_rows <= 0) {
		$error_message = "Not an authorised user";
	}
	else
	{
		$amt=$_SESSION['amt'];
		$row = $result->fetch_assoc();
		if($amt>$row["bal"])
			$error_message = "Insufficient balance.Please recharge to continue.";
	}
	if(!isset($error_message)) {
		$_SESSION['pin']=$row["pin"];
		header('location:pay1.php');
	}
}

?>
<body>
<table border="0" align="right">
<tr>
<td><?php echo "Welcome "; echo $user; ?></td></tr>
</table>
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
<td>Card Name:</td>
<td><input class="demoInputBox" type="text" name="cname" value=""></td>
</tr>
<tr>
<td>Card Number:</td>
<td><input class="demoInputBox" type="text" name="cno" value=""></td>
</tr>
<tr>
<td>CVV:</td>
<td><input class="demoInputBox" type="password" name="cvv" value=""></td>
</tr>
<tr>
<td>Expiry Date:</td>
<td><input class="demoInputBox" id="datepicker" name="exdate" value=""></td>
</tr>
<tr>
<td align="center" colspan="2"><input class="btn-Register" type="submit" name="submit" value="Submit"></td>
</tr>
</form>
</center>
</div>
</body>