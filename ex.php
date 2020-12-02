<?php
	session_start();
	$db=mysqli_connect("localhost","root","","authentication");
	
	if(isset($_POST['submit']))
	{
	session_start();
	$uname=mysql_real_escape_string($_POST['uname']);
	$umobile=mysql_real_escape_string($_POST['no']);
	$ugender=mysql_real_escape_string($_POST['know']);
	$udob=mysql_real_escape_string($_POST['dob']);
	$umail=mysql_real_escape_string($_POST['mail']);
	$upwd=mysql_real_escape_string($_POST['pwd']);
	$usecques=mysql_real_escape_string($_POST['ques']);
	$usecans=mysql_real_escape_string($_POST['ans']);
	
	$sql="INSERT INTO users(username, mobile, gender, dob, mail, pword, secques, secans) VALUES('$uname', '$umobile', '$ugender', '$udob', '$umail', '$upwd', '$usecques', '$usecans');
	mysqli_query($db, $sql);
	header('location: login.php');
	}
	
?>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="bgd.css">
	</head>
	<body>    
	<form method="post" action="login.php">
	 <table align="center" cellpadding="2">
	  <thead>
	   <tr>
	    <th><h3>Fill in the details to login as user</h3></th>
	   </tr>
	  </thead>
	  <tbody>
	   <tr>
		<td>UserName</td>
		<td><input type="text" name="uname" id="uname"/></td>
	   </tr>
	   
	   <tr>
		<td>Mobile No.</td>
		<td><input type="text" name="no" id="num"/></td>
	   </tr>
	   <tr>
		<td>Gender</td>
		<td><input name="know" type="radio"/>Male
		<input name="know" type="radio"/>Female</td>
	   </tr>
	   <tr>
		<td>Date of birth</td>
		<td><input type="text" name="dob" id="dob" placeholder="DD/MM/YYYY"/></td>
	   </tr>
	   <tr>
		<td>Email</td>
		<td><input type="text" name="mail" id="mail"/></td>
	   <tr>
		<td>Password</td>
		<td><input type="password" name="pwd" id="pword"/></td>
	   </tr>
	   <tr>
		<td>Security Question</td>
		<td><select name="ques">
			<option>Pet name</option>
			<option>First School Name</option>
			<option>Favourite Movie</option>
		</td>
	   </tr>
	   <tr>
		<td>Security Answer</td>
		<td><input type="text" name="ans" id="ans"/></td>
	   </tr>
	   <tr>
		<td><input type="submit" value="submit" id="submit"/></td>
		<td><input type="reset" value="reset" id="rst"/></td>
	   </tr>
	  </tbody>
	</table>
	</form>
	</body>
</html>