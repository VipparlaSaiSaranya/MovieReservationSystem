<?php include "db.php" ?>
<?php
session_start();
if(isset($_POST['submit']))
{
 mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('project') or die(mysql_error());
 $conn = new mysqli('localhost','root','','project');
 $date1=date("Y-m-d");
 $sql = "DELETE FROM bookdet WHERE bdate<'$date1'";
 $conn->query($sql);
 $sql = "DELETE FROM movies WHERE edate<'$date1'";
 $conn->query($sql);
 $username=$_POST['username'];
 $password=$_POST['password'];
 if($username!='' && $password!='')
 {
   $query=mysql_query("select * from candid where userid='".$username."' and password='".$password."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   
   if($res)
   {
        $_SESSION['username']=$username;
        header('location:usoptions.php');
   }
   else
    $error_message = 'Username or password is incorrect';
 }
 else
    $error_message = 'Enter both username and password'; 
}
?>
<html>
<head>
<style>
.btnRegister {
	display:inline;
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	font-size:20px;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
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
	align:center;
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
</style>
</head>
<body>
<center>
<h2>Online Movie Ticket Booking</h2>
<h3>
<i>Login...</i></h3>      
<form method="POST" action="">
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<table border="0" align="center" class="demo-table">
<tr>
<td for="username">Username:</td>
<td><input class="demoInputBox" type="text" id="username" name="username"></td>
</tr>
<tr>
<td for="password">Password:</td>
<td><input class="demoInputBox" type="password" id="password" name="password"></td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="register.php">not a registered user??</a></td>
</tr>
<tr>
<td align="center"><input class="btnRegister" type="submit" id="submit" name="submit" value="Login"></td>
<td align="center"><input class="btnRegister" type="button" onclick="location.href='home.php'" name="back" value="Back"></td>
</tr>
</table>
</form>
</center>
</body>
</html>