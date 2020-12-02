<style>
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
	font-size: 20px;
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

td{
	font-size:20px;
	font-style:italic;
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
$date=$_SESSION['date'];
$movie=$_SESSION['movie'];
$tname=$_SESSION['tname'];
$stime=$_SESSION['time'];
$a2=$_SESSION['t1'];
$amt=$_SESSION['amt'];
?>
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
<center>
<table border="0" class="demo-table">
<tr><td>Movie:</td><td><?php echo $movie;?></td></tr>
<tr><td>Theater:</td><td><?php echo $tname;?></td></tr>
<tr><td>Date:</td><td>
<?php $date = date("d-m-Y", strtotime($date)); 
echo $date;?></td></tr>
<tr><td>Show Time:</td><td><?php echo $stime;?></td></tr>
<tr>
<td>Seats:</td>
<td>
<?php 
$i=0;
$j=$_SESSION['c'];
$sum=0;
while($i<$j-1)
{
	echo $a2[$i];
	echo ',';
	$i=$i+1;
}
echo $a2[$i];
?></td>
</tr>
<tr>
<td>Amount:</td>
<td><?php echo 'Rs.'; echo $amt;?></td>
</tr>
<tr>
<td colspan="2" align="center">Booking successfull,enjoy the movie..!!</td>
</tr>
</table>
</center>
</body>