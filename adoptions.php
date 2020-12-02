<?php
session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:logout-1.php');
}	
$user=$_SESSION['adminid'];
?>
<html>
<head>
<style>
.button {
  display: block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 200px;
  transition: all 0.4s;
  cursor: pointer;
  margin: 10px;
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

.btnRegister {
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

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>
<table border="0" align="right">
<tr>
<td><?php echo "Welcome "; echo $user; ?></td>
<td><input type="button" class="btnRegister" value="Home" onclick="location.href='adoptions.php'"></td>
<td><input type="button" class="btnRegister" value="Logout" onclick="location.href='logout.php'"></td>
</tr>
</table>
<br>
<br><br>
<br><br>
<center>
<button class="button" style="vertical-align:middle" onclick="location.href='insert.php'"><span>Add new movie</span></button>
<button class="button" style="vertical-align:middle" onclick="location.href='view.php'"><span>View movie details</span></button>
<button class="button" style="vertical-align:middle" onclick="location.href='history1.php'"><span>Booking history</span></button>
</center>
</body>
</html>