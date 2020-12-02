<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:logout-1.php');
}
$user=$_SESSION['adminid'];
if(!empty($_POST["submit"])) {
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All fields are required";
		break;
		}
	}
	if(!isset($error_message)) {
		mysql_connect('localhost','root','') or die(mysql_error());
 		mysql_select_db('project') or die(mysql_error());
		$username=$_POST['mname'];
 		$password=$_POST['tname'];
 		$rdate=$_POST['stdate'];
	 	$rdate = date("Y-m-d", strtotime($rdate));
 		$gdate=$_POST['edate'];
 		$gdate = date("Y-m-d", strtotime($gdate));
   		$query=mysql_query("INSERT INTO movies (name,tname,sdate,edate) VALUES ('$username','$password','$rdate','$gdate')") or die(mysql_error());
  		if($query)
   		{
        		header('location:adoptions.php');
   		}
	}
}
?>
<html>
<head>
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
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
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
</style>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>
</head>
<body>
<table border="0" align="right">
<tr>
<td><?php echo "Welcome "; echo $user; ?></td>
<td><input type="button" class="btn-Register" value="Home" onclick="location.href='adoptions.php'"></td>
<td><input type="button" class="btn-Register" value="Logout" onclick="location.href='log.php'"></td>
</tr>
</table>
<br>
<br>
<br>
<br>
<div> 

<form method="POST" action="">
<center>
<h1><i>Movie Details....</i></h1>
<table border="0" class="demo-table">
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>Movie Name:</td>
<td><input class="demoInputBox" type="text" name="mname" value=""></td>
</tr>
<tr>
<td>Theater:</td>
<td><input class="demoInputBox" type="text" name="tname" value=""></td>
</tr>
<tr>
<td>Release Date:</td>
<td><input class="demoInputBox" id="datepicker" name="stdate" value=""></td>
</tr>
<tr>
<td>End Date:</td>
<td><input class="demoInputBox" id="datepicker1" name="edate" value=""></td>
</tr>
<tr>
<td align="center"><input class="btnRegister" type="submit" name="submit" value="Submit"></td>
<td align="center"><input class="btnRegister" id="button" type="button" onClick="location.href='adoptions.php'" value='Back'></td>
</tr>
</form>
</center>
</div>
</body>
</html>


