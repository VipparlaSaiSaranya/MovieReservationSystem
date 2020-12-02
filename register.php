<?php
session_start();

mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('project') or die(mysql_error());

if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	

	if(!isset($error_message)) {
		$username=$_POST['userName'];
 		$password=$_POST['password'];
 		$email=$_POST['userEmail'];
 		$mobile=$_POST['mobileno'];
 		$dob=$_POST['dob'];
 		$dob = date("Y-m-d", strtotime($dob));
   		$query=mysql_query("INSERT INTO candid (userid,password,emailid,phno,dob) VALUES ('$username','$password','$email','$mobile','$dob')") or die(mysql_error());
   
   		if($query)
  		{
	   		$_SESSION['username']=$username;
           		header('location:login.php');
   		}
		
	}
}
?>
<html>
<head>
<style>
body{
	font-family:calibri;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
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
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
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
</head>
<body>
<h2 align='center'><i>Register...</i></h2>
<form name="frmRegistration" method="post" action="">
<center>
<table border="0"  align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>User Name</td>
<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value=""></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
</tr>
<tr>
<td>Mobile Number</td>
<td><input type="text" class="demoInputBox" name="mobileno" value="<?php if(isset($_POST['mobileno'])) echo $_POST['mobileno']; ?>"></td>
</tr>
<tr>
<td>Date of birth</td>
<td><input class="demoInputBox" id="datepicker" name="dob" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; ?>"></td>
</tr>
<tr>
<td colspan=2 align="center">
<input type="submit" name="register-user" value="Register" class="btnRegister"></td>
</tr>
</table>
</center>
</form>

</body></html>