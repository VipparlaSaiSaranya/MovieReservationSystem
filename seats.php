
<?php
$conn = new mysqli("localhost", "root", "", "project");
// Check connection
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
$date = date("Y-m-d", strtotime($date));
$sql = "SELECT t1,t2,t3,t4,t5,t6 FROM bookdet WHERE mname='$movie' and thname='$tname' and bdate='$date' and stime='$stime'";
$result = $conn->query($sql);
$a=array();
while($row = $result->fetch_assoc())
{
	if(strcmp($row["t1"],"-1")!=0)
		array_push($a,$row["t1"]);
	if($row["t2"]!="-1")
		array_push($a,$row["t2"]);
	if($row["t3"]!="-1")
		array_push($a,$row["t3"]);
	if($row["t4"]!="-1")
		array_push($a,$row["t4"]);
	if($row["t5"]!="-1")
		array_push($a,$row["t5"]);
	if($row["t6"]!="-1")
		array_push($a,$row["t6"]);
	
}
if(!empty($_POST["submit"])) {
$array=$_POST;
$ar1=array(array_keys($array));
if(count($ar1[0])==1)
	$error_message = 'Please select your seats!!!';
if(count($ar1[0])>7)
{
	$error_message = 'You can select at maximum only 6 tickets!!!';
}
if(!isset($error_message) ) {
	$_SESSION['ticket']=$ar1;
	header('location:seats1.php');
}
}

$conn->close();
?>

<script>
function Disable() {
    var com = <?php echo json_encode($a); ?>;
    for(var i=0;i<com.length;i++){
	document.getElementById(com[i]).disabled = true;
	}
}

</script>


<style>
input[type=checkbox] {
	visibility: hidden;
}

.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}


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
td{
	font-size:20px;
	font-style:italic;
}

.checkboxFour {
	display:inline-block;
	margin-right:-5px;
	float:left;
	width: 40px;
	height: 40px;
	background: #ddd;
	margin: 5px 5px;
	border-radius: 100%;
	position: relative;
	box-shadow: 0px 1px 3px rgba(0,0,0,0.5);
}

.checkboxFour label {

	display:inline-block;
	margin-right:-5px;
	float:left;
	width: 30px;
	height: 30px;
	border-radius: 100px;
	top: 5px;
	left: 5px;

	transition: all .5s ease;
	cursor: pointer;
	position: absolute;

	z-index: 1;
	text-align:center;
	font-size:25px;
	background: #fff;
	box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
}

.checkboxFour input[type=checkbox]:checked + label {
	display:inline-block;
	margin-right:-5px;
	float:left;
	background: #26ca28;
}
.checkboxFour input[type=checkbox]:disabled + label {
	display:inline-block;
	margin-right:-5px;
	cursor:not-allowed;
	float:left;
	background: #ff0000;
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
<body onload="Disable()">
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

<form method="post" action="">
<section>
<center>
<table border="0" class="demo-table">
<tr><td>Movie:</td><td><?php echo $movie;?></td></tr>
<tr><td>Theater:</td><td><?php echo $tname;?></td></tr>
<tr><td>Date:</td><td>
<?php $date = date("d-m-Y", strtotime($date)); 
echo $date;?></td></tr>
<tr><td>Show Time:</td><td><?php echo $stime;?></td></tr>
</table>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
</center>
<table align="center">
<tr>
   <td colspan="26" align="center" style="font-size:30px">Balcony-RS.100</td>
</tr>
<tr>
  <td style="font-size:30px">A</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A1" name="A1" disabled/>
  	<label for="A1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="A2" name="A2" disabled/>
  	<label for="A2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A3" name="A3" disabled/>
  	<label for="A3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A4" name="A4" disabled/>
  	<label for="A4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A5" name="A5" disabled/>
  	<label for="A5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A6" name="A6" disabled/>
  	<label for="A6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="A7" name="A7" disabled/>
  	<label for="A7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A8" name="A8" disabled/>
  	<label for="A8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A9" name="A9" disabled/>
  	<label for="A9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A10" name="A10" disabled/>
  	<label for="A10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A11" name="A11" disabled/>
  	<label for="A11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="A12" name="A12" disabled/>
  	<label for="A12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A13" name="A13" disabled/>
  	<label for="A13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A14" name="A14" disabled/>
  	<label for="A14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A15" name="A15" disabled/>
  	<label for="A15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="A16" name="A16" disabled/>
  	<label for="A16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">B</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B1" name="B1" disabled/>
  	<label for="B1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="B2" name="B2" disabled/>
  	<label for="B2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B3" name="B3" disabled/>
  	<label for="B3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B4" name="B4" disabled/>
  	<label for="B4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B5" name="B5" disabled/>
  	<label for="B5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B6" name="B6" disabled/>
  	<label for="B6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="B7" name="B7" disabled/>
  	<label for="B7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B8" name="B8" disabled/>
  	<label for="B8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B9" name="B9" disabled/>
  	<label for="B9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B10" name="B10" disabled/>
  	<label for="B10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B11" name="B11" disabled/>
  	<label for="B11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="B12" name="B12" disabled/>
  	<label for="B12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B13" name="B13" disabled/>
  	<label for="B13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B14" name="B14" disabled/>
  	<label for="B14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B15" name="B15" disabled/>
  	<label for="B15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="B16" name="B16" disabled/>
  	<label for="B16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">C</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C1" name="C1" />
  	<label for="C1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="C2" name="C2" />
  	<label for="C2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C3" name="C3" />
  	<label for="C3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C4" name="C4" />
  	<label for="C4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C5" name="C5" />
  	<label for="C5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C6" name="C6" />
  	<label for="C6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="C7" name="C7" />
  	<label for="C7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C8" name="C8" />
  	<label for="C8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C9" name="C9" />
  	<label for="C9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C10" name="C10" />
  	<label for="C10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C11" name="C11" />
  	<label for="C11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="C12" name="C12" />
  	<label for="C12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C13" name="C13" />
  	<label for="C13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C14" name="C14" />
  	<label for="C14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C15" name="C15" />
  	<label for="C15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="C16" name="C16" />
  	<label for="C16">16</label>
  </td>
</tr>

<tr>
  <td style="font-size:30px">D</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D1" name="D1" />
  	<label for="D1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="D2" name="D2" />
  	<label for="D2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D3" name="D3" />
  	<label for="D3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D4" name="D4" />
  	<label for="D4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D5" name="D5" />
  	<label for="D5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D6" name="D6" />
  	<label for="D6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="D7" name="D7" />
  	<label for="D7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D8" name="D8" />
  	<label for="D8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D9" name="D9" />
  	<label for="D9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D10" name="D10" />
  	<label for="D10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D11" name="D11" />
  	<label for="D11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="D12" name="D12" />
  	<label for="D12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D13" name="D13" />
  	<label for="D13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D14" name="D14" />
  	<label for="D14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D15" name="D15" />
  	<label for="D15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="D16" name="D16" />
  	<label for="D16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">E</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E1" name="E1" />
  	<label for="E1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="E2" name="E2"/>
  	<label for="E2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E3" name="E3" />
  	<label for="E3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E4" name="E4" />
  	<label for="E4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E5" name="E5" />
  	<label for="E5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E6" name="E6" />
  	<label for="E6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="E7" name="E7" />
  	<label for="E7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E8" name="E8" />
  	<label for="E8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E9" name="E9" />
  	<label for="E9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E10" name="E10" />
  	<label for="E10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E11" name="E11" />
  	<label for="E11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="E12" name="E12" />
  	<label for="E12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E13" name="E13" />
  	<label for="E13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E14" name="E14" />
  	<label for="E14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E15" name="E15" />
  	<label for="E15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="E16" name="E16" />
  	<label for="E16">16</label>
  </td>
</tr>

<tr>
  <td style="font-size:30px">F</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F1" name="F1" />
  	<label for="F1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="F2" name="F2" />
  	<label for="F2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F3" name="F3" />
  	<label for="F3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F4" name="F4" />
  	<label for="F4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F5" name="F5" />
  	<label for="F5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F6" name="F6" />
  	<label for="F6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="F7" name="F7" />
  	<label for="F7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F8" name="F8" />
  	<label for="F8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F9" name="F9" />
  	<label for="F9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F10" name="F10" />
  	<label for="F10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F11" name="F11" />
  	<label for="F11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="F12" name="F12" />
  	<label for="F12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F13" name="F13" />
  	<label for="F13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F14" name="F14" />
  	<label for="F14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F15" name="F15" />
  	<label for="F15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="F16" name="F16" />
  	<label for="F16">16</label>
  </td>
</tr>
<tr>
   <td colspan="26" style="font-size:30px"></td>
</tr>
<tr>
   <td colspan="26" style="font-size:30px"></td>
</tr>

<tr>
   <td colspan="26" align="center" style="font-size:30px">First Class-RS.60</td>
</tr>
<tr>
  <td style="font-size:30px">G</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G1" name="G1" />
  	<label for="G1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="G2" name="G2" />
  	<label for="G2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G3" name="G3" />
  	<label for="G3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G4" name="G4" />
  	<label for="G4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G5" name="G5" />
  	<label for="G5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G6" name="G6" />
  	<label for="G6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="G7" name="G7" />
  	<label for="G7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G8" name="G8" />
  	<label for="G8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G9" name="G9" />
  	<label for="G9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G10" name="G10" />
  	<label for="G10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G11" name="G11" />
  	<label for="G11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="G12" name="G12" />
  	<label for="G12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G13" name="G13" />
  	<label for="G13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G14" name="G14" />
  	<label for="G14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G15" name="G15" />
  	<label for="G15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="G16" name="G16" />
  	<label for="G16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">H</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H1" name="H1" />
  	<label for="H1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="H2" name="H2" />
  	<label for="H2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H3" name="H3" />
  	<label for="H3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H4" name="H4" />
  	<label for="H4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H5" name="H5" />
  	<label for="H5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H6" name="H6" />
  	<label for="H6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="H7" name="H7" />
  	<label for="H7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H8" name="H8" />
  	<label for="H8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H9" name="H9" />
  	<label for="H9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H10" name="H10" />
  	<label for="H10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H11" name="H11" />
  	<label for="H11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="H12" name="H12" />
  	<label for="H12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H13" name="H13" />
  	<label for="H13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H14" name="H14" />
  	<label for="H14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H15" name="H15" />
  	<label for="H15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="H16" name="H16" />
  	<label for="H16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">I</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I1" name="I1" />
  	<label for="I1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="I2" name="I2" />
  	<label for="I2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I3" name="I3" />
  	<label for="I3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I4" name="I4" />
  	<label for="I4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I5" name="I5" />
  	<label for="I5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I6" name="I6" />
  	<label for="I6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="I7" name="I7" />
  	<label for="I7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I8" name="I8" />
  	<label for="I8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I9" name="I9" />
  	<label for="I9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I10" name="I10" />
  	<label for="I10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I11" name="I11" />
  	<label for="I11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="I12" name="I12" />
  	<label for="I12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I13" name="I13" />
  	<label for="I13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I14" name="I14" />
  	<label for="I14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I15" name="I15" />
  	<label for="I15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="I16" name="I16" />
  	<label for="I16">16</label>
  </td>
</tr>

<tr>
   <td colspan="26" style="font-size:30px"></td>
</tr>
<tr>
   <td colspan="26" style="font-size:30px"></td>
</tr>

<tr>
   <td colspan="26" align="center" style="font-size:30px">Second Class-RS.30</td>
</tr>
<tr>
  <td style="font-size:30px">J</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J1" name="J1" />
  	<label for="J1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="J2" name="J2" />
  	<label for="J2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J3" name="J3" />
  	<label for="J3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J4" name="J4" />
  	<label for="J4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J5" name="J5" />
  	<label for="J5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J6" name="J6" />
  	<label for="J6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="J7" name="J7" />
  	<label for="J7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J8" name="J8" />
  	<label for="J8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J9" name="J9" />
  	<label for="J9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J10" name="J10" />
  	<label for="J10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J11" name="J11" />
  	<label for="J11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="J12" name="J12" />
  	<label for="J12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J13" name="J13" />
  	<label for="J13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J14" name="J14" />
  	<label for="J14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J15" name="J15" />
  	<label for="J15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="J16" name="J16" />
  	<label for="J16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">K</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K1" name="K1" />
  	<label for="K1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="K2" name="K2" />
  	<label for="K2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K3" name="K3" />
  	<label for="K3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K4" name="K4" />
  	<label for="K4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K5" name="K5" />
  	<label for="K5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K6" name="K6" />
  	<label for="K6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="K7" name="K7" />
  	<label for="K7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K8" name="K8" />
  	<label for="K8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K9" name="K9" />
  	<label for="K9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K10" name="K10" />
  	<label for="K10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K11" name="K11" />
  	<label for="K11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="K12" name="K12" />
  	<label for="K12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K13" name="K13" />
  	<label for="K13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K14" name="K14" />
  	<label for="K14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K15" name="K15" />
  	<label for="K15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="K16" name="K16" />
  	<label for="K16">16</label>
  </td>
</tr>


<tr>
  <td style="font-size:30px">L</td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L1" name="L1" />
  	<label for="L1">1</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="L2" name="L2" />
  	<label for="L2">2</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L3" name="L3" />
  	<label for="L3">3</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L4" name="L4" />
  	<label for="L4">4</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L5" name="L5" />
  	<label for="L5">5</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L6" name="L6" />
  	<label for="L6">6</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="L7" name="L7" />
  	<label for="L7">7</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L8" name="L8" />
  	<label for="L8">8</label>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L9" name="L9" />
  	<label for="L9">9</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L10" name="L10" />
  	<label for="L10">10</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L11" name="L11" />
  	<label for="L11">11</label>
  </td>
  <td class="checkboxFour">
	<input type="checkbox" value="1" id="L12" name="L12" />
  	<label for="L12">12</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L13" name="L13" />
  	<label for="L13">13</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L14" name="L14" />
  	<label for="L14">14</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L15" name="L15" />
  	<label for="L15">15</label>
  </td>
  <td class="checkboxFour">
  	<input type="checkbox" value="1" id="L16" name="L16" />
  	<label for="L16">16</label>
  </td>
</tr>

</table>
</section>
<center>
<br><br>
<input type="submit" class="btnRegister" name="submit" value="Proceed" />
</center>
</form>
</body>