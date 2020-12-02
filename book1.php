<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logout1.php');
}	
$user=$_SESSION['username'];
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

</style>
</head>
<body>
<table border="0" align="right">
<tr>
<td><?php echo "Welcome "; echo $user; ?></td>
<td><input type="button" class="btnRegister" value="Home" onclick="location.href='usoptions.php'"></td>
<td><input type="button" class="btnRegister" value="Logout" onclick="location.href='logout.php'"></td>
</tr>
</table>
<br>
<br><br>
<br><br>
<?php
$conn = new mysqli("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<center><table border='0' class='demo-table' cellpadding='25'><tr><th>Movie Name</th><th>Theater</th><th>Release Date</th><th>End date</th><th>Book</th></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td align='center';>".$row["name"]."</td>";
echo "<td align='center'>".$row["tname"]."</td>";
echo "<td align='center'>".$row["sdate"]."</td>";
echo "<td align='center'>".$row["edate"]."</td>";
echo "<td align='center'><input type='button' class='btn-Register' name='ok' value='Book' onclick='location.href=\"date.php?h={$row["name"]} & i={$row["tname"]}\"'></td>";
echo "</tr>";
}
echo "</table></center>";
}
?>
