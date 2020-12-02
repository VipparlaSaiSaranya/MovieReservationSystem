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
	font-size: 20px;
	font-style:italic;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}

td{
	font-size:20px;
	font-style:italic;
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

if(!empty($_POST["submit"])) {
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "PIN is mandatory";
		break;
		}
	}
	$pin=$_SESSION['pin'];
	$amt=$_SESSION['amt'];
	if($pin!=$_POST['cpin'])
		$error_message = "Incorrect PIN";
	elseif(!isset($error_message)) 
	{
		$sql = "UPDATE bank SET bal=bal-$amt WHERE pin='$pin'";
		$conn->query($sql);
		$sql = "UPDATE bank SET bal=bal+$amt WHERE pin='6261'";
		$conn->query($sql);
		$user=$_SESSION['username'];
		$date=$_SESSION['date'];
		$movie=$_SESSION['movie'];
		$tname=$_SESSION['tname'];
		$stime=$_SESSION['time'];
		$a2=$_SESSION['t1'];
		$i=$_SESSION['c'];
		$date = date("Y-m-d", strtotime($date));
		$sql = "INSERT INTO bookdet (usid, mname, thname,bdate,stime,count,t1,t2,t3,t4,t5,t6,amount)
		VALUES ('$user','$movie','$tname',\"$date\",'$stime','$i','$a2[0]','$a2[1]','$a2[2]','$a2[3]','$a2[4]','$a2[5]','$amt')";
		$conn->query($sql);
		$conn->close();
		header('location:pay2.php');
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
<td>Pin:</td>
<td><input class="demoInputBox" type="password" name="cpin" value=""></td>
</tr>
<tr>
<td align="center" colspan="2"><input class="btn-Register" type="submit" name="submit" value="Submit"></td>
</tr>
</form>
</center>
</div>
</body>