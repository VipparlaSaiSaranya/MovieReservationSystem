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
	font-size:20px;
	font-style:italic;
}
th{
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
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logout1.php');
}
$user=$_SESSION['username'];
?>
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
<?php
$conn = new mysqli("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM bookdet where usid='$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<center><table border='0' class='demo-table' cellpadding='25'><tr><th>Movie Name</th><th>Theater</th><th>Date</th><th>Show Time</th><th>Seats</th><th>Amount</th><th>Cancel</th></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td align='center';>".$row["mname"]."</td>";
echo "<td align='center'>".$row["thname"]."</td>";
echo "<td align='center'>".$row["bdate"]."</td>";
echo "<td align='center'>".$row["stime"]."</td>";
echo "<td align='center'>";
if($row["t1"]!=-1)
	echo " ".$row["t1"]." ";
if($row["t2"]!=-1)
	echo " ".$row["t2"]." ";
if($row["t3"]!=-1)
	echo " ".$row["t3"]." ";
if($row["t4"]!=-1)
	echo " ".$row["t4"]." ";
if($row["t5"]!=-1)
	echo " ".$row["t5"]." ";
if($row["t6"]!=-1)
	echo " ".$row["t6"]." ";
echo "</td>";
echo "<td align='center'>".$row["amount"]."</td>";
echo "<td align='center'><input type='button' class='btn-Register' name='ok' value='Cancel' onclick='location.href=\"can2.php?h={$row["mname"]} & i={$row["thname"]} & j={$row["bdate"]} & p={$row["stime"]} & q={$row["t1"]} & v={$row["amount"]}\"'></td>";
echo "</tr>";
}
echo "</table></center>";
}
?>
