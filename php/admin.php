<html>
  <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron">
 <h1 class="display-4">QURIES</h1>
  <p class="lead">List of all possible candidates.</p>
  <hr class="my-4">
  
  <p class="lead text-primary">
<?php
$servername= "localhost";
$username = "antony";
$password = "root";
$db = "bank";
$con= new mysqli($servername, $username, $password, $db);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$amount=$_POST['amt'];
$sign=$_POST['sign'];

if($sign == '<')
	$sql="select * from custbalance where  curbalance <= '$amt'";
else
	$sql="select * from custbalance where  curbalance > '$amt'";
$res = $con->query($sql);

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
	echo "Account No: " . $row["accnum"]. "<br>". "Name: " . $row["cusname"]. "<br>". "Balance:" . $row["curbalance"]. "<br>"."Account type: ".$row["acctype"]. "<br>". "<br>". "<br>". "<br>";}
}

?>
</div>
</body>
</html>
