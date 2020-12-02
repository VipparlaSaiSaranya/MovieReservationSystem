<style>
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
b{
	font-size: 20px;
	font-style:italic;
}

</style>
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logout1.php');
}	
$user=$_SESSION['username'];
echo "<h3 align='right'>Welcome ".$user."</h3>";

$movie=$_SESSION['movie'];
$tname=$_SESSION['tname'];
$conn = new mysqli("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="select sdate,edate from movies where name='$movie' and tname='$tname' ";
$res=$conn->query($sql);
$date1=$_POST['d1'];
$time1=$_POST['st1'];

//echo $time1;
$row=$res->fetch_assoc();
$date2=$row["sdate"];
$date3=$row["edate"];
$date4=date("Y-m-d");
if($date1!="")
{
$r1=date_diff(date_create($date2),date_create($date1));
//echo $r1->format("%R%a");
$r2=date_diff(date_create($date1),date_create($date3));
$r3=date_diff(date_create($date4),date_create($date1));
//echo $r3->format("%R%a");
if($r1->format("%R%a")>=0 && $r2->format("%R%a")>=0 && $r3->format("%R%a")>=0)
{
   if($r3->format("%R%a")==0)
   {
	$time2=strtotime($time1);
	$time3=strtotime("now");
	if($time2<$time3)
	{
	   echo "<center><b>Show timing you selected has started already!!<b><br>"; 
  	   echo "<input type='button' class='btn-Register' name='ok' value='Ok' onclick='location.href=\"date.php?h={$movie} & i={$tname}\"'></center>";
	}
	else
	{
	   $_SESSION['time']=$time1;
   	   $_SESSION['date']=$date1;
   	   header('location:seats.php');	
	}	
   }
   else
   {
   	$_SESSION['time']=$time1;
   	$_SESSION['date']=$date1;
   	header('location:seats.php');
   }
}
else
{
  echo "<center><b>Invalid date</b><br>"; 
  echo "<input type='button' class='btn-Register' name='ok' value='Ok' onclick='location.href=\"date.php?h={$movie} & i={$tname}\"'></center>";
}
}
else
{
  echo "<center><b>Please select a date</b><br>"; 
  echo "<input type='button' class='btn-Register' name='ok' value='Ok' onclick='location.href=\"date.php?h={$movie} & i={$tname}\"'></center>";
}   
?>