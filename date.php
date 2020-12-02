<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logout1.php');
}	
$user=$_SESSION['username'];

$_SESSION['movie']=$_GET['h'];
$_SESSION['tname']=$_GET['i'];

$movie=$_SESSION['movie'];
$tname=$_SESSION['tname'];
?>
<html>
<head>
<style>
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 1;
	color: #FFF;
	font-size:20px;
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
.demo-table {
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

td{
font-size:20px;}

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


<form method="post" action="date1.php">
<center>
<table border="0" class="demo-table">
<tr><td>Movie:</td><td><?php echo $movie;?></td></tr>
<tr><td>Theater:</td><td><?php echo $tname;?></td></tr>
<tr><td>Select a date:</td><td><input class="demoInputBox" id="datepicker" name="d1"/></td></tr>
<tr><td>Show Time:</td>
<td><input type="radio" name="st1" id="11:00AM" value="11:00AM" checked> 
    <label for="11:00AM">11:00AM</label><br>
    <input type="radio" name="st1" id="02:30PM" value="02:30PM">
    <label for="2:30PM">02:30PM</label><br>
    <input type="radio" name="st1" id="06:45PM" value="06:45PM">
    <label for="6:45PM">06:45PM</label><br>
    <input type="radio" name="st1" id="09:30PM" value="09:30PM">
    <label for="9:30PM">09:30PM</label></td></tr>
<tr>
<td colspan="2" align="center">
    <input class="btn-Register" type="submit" name="submit" value="Proceed">
</td>
</center>   
</form>

</body>
</html>
