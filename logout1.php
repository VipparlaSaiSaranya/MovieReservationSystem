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
echo "<center><b>Please login to continue... </b><br>"; 
echo "<input type='button' class='btn-Register' name='ok' value='Ok' onclick='location.href=\"login.php\"'></center>";
?>