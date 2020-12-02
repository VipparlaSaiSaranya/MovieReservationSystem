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
$conn = new mysqli("localhost", "root", "", "project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logout1.php');
}	
$user=$_SESSION['username'];
$date=$_SESSION['date'];
$movie=$_SESSION['movie'];
$tname=$_SESSION['tname'];
$stime=$_SESSION['time'];
$ar1=$_SESSION['ticket'];
?>

<?php
$a2=array("-1","-1","-1","-1","-1","-1");
$i=0;
while($i<count($ar1[0])-1)
{
	$a2[$i]=$ar1[0][$i];
	$i=$i+1;
}
$i=count($ar1[0])-1;
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
<tr><td>Seats:</td><td>
<?php 
$i=0;
$sum=0;
while($i<count($ar1[0])-2)
{
	echo $a2[$i];
	echo ',';
	if($a2[$i] >= 'A' && $a2[$i] < 'G')
		$sum=$sum+100;
	elseif($a2[$i] >= 'G' && $a2[$i] < 'J')
		$sum=$sum+60;
	elseif($a2[$i] >= 'J' && $a2[$i] < 'M')
		$sum=$sum+30;
	$i=$i+1;
}
echo $a2[$i];
if($a2[$i] >= 'A' && $a2[$i] < 'G')
	$sum=$sum+100;
elseif($a2[$i] >= 'G' && $a2[$i] < 'J')
	$sum=$sum+60;
elseif($a2[$i] >= 'J' && $a2[$i] < 'M')
	$sum=$sum+30;
$_SESSION['t1']=$a2;
$_SESSION['c']=count($ar1[0])-1;
?>
</td></tr>
<tr><td>Amount:</td>
<td>
<?php echo 'Rs.';
echo $sum;
$_SESSION['amt']=$sum;
?>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input class="btnRegister" type="submit" name="submit" value="Book" onclick="location.href='payment.php'"></td></tr>
</table>
</center>
</body>
<?php
/*
$i=count($ar1[0])-1;
$date = date("Y-m-d", strtotime($date));
$sql = "INSERT INTO bookdet (usid, mname, thname,bdate,stime,count,t1,t2,t3,t4,t5,t6)
VALUES ('$user','$movie','$tname',\"$date\",'$stime','$i','$a2[0]','$a2[1]','$a2[2]','$a2[3]','$a2[4]','$a2[5]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
*/
?>