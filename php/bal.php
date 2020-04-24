<html>
  <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron">
<hr class="my-4">
<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
<p class="lead text-primary">
<?php 
$servername= "localhost";
$user = "antony";
$password = "root";
$db = "bank";
$con = new mysqli($servername,$user,$password,$db);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$deposit = $_POST["deposit"];
$withdraw = $_POST["withdraw"];
$pass = $_POST["pass"];
$sql1 = "select * from custlogin where PIN='$pass'";
$result1 = $con->query($sql1);
if($result1->num_rows > 0){
while($row = $result1->fetch_assoc()){
	$user = $row['accnum'];
	//echo $user."<br>";}
}
$sql2 = "select curbalance from custbalance where accnum='$user'";
$result2 = $con->query($sql2);
if($result2->num_rows > 0){
while($row = $result2->fetch_assoc()){
	$balance = (float) $row['curbalance'];
	//echo $balance."<br>";
}
}
else
	echo "fail";

$balance = $balance + $deposit;
$balance = $balance - $withdraw;
if($balance <= 0){
	echo "Not enough Balance;";}
else
	{
//echo $balance."<br>";
$sql3="UPDATE custbalance SET curbalance=$balance WHERE accnum='$user'";
$result3 = $con->query($sql3);
if($result3===TRUE){
echo "updated"."<br>";
}
$sql2 = "select * from custbalance where accnum='$user'";
$result2 = $con->query($sql2);
if($result2->num_rows > 0){
while($row = $result2->fetch_assoc()){
	echo "Account No: " . $row["accnum"]. "<br>". "Name: " . $row["cusname"]. "<br>". "Balance:" . $row["curbalance"]. "<br>"."Account type: ".$row["acctype"]. "<br>";}
}
}
}
  
?>
<br>
<br>
<a class="btn btn-lg btn-outline-primary"href="start.html"> Sign out </a>
</p>
</div>
</body>
</html>
