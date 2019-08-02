<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
<div class="jumbotron">
 <p class="lead">
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
$user = $_POST["user"];
$pass = $_POST["pass"];
$sql = "select * from custlogin where accnum='$user' and PIN='$pass' ";
$sql1 = "select * from custbalance where accnum='$user' ";
$result = $con->query($sql);
$result1 = $con->query($sql1);
if( ($result->num_rows > 0) && ($result1->num_rows > 0) ){
while($row = $result1->fetch_assoc()) {
        echo "Account No: " . $row["accnum"]. "<br>". "Name: " . $row["cusname"]. "<br>". "Balance: " . $row["curbalance"]. "<br>"."Account type: ".$row["acctype"]. "<br>";
}
}

if( ($result->num_rows > 0) && ($result1->num_rows > 0) ){
?>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
	<form method=POST action="bal.php"><br>
        <h1 class="my-0 font-weight-normal">welcome  </h1>
      </div> 
      <div class="card-body">
        <h3 class="card-title pricing-card-title">TRANSACTIONS</h3>
<br><br>
        <ul class="list-unstyled mt-3 mb-4">
          <li><p class="text-primary">Deposit Amount:<input type="textbox" name ="deposit"><br></li></p>
	<li><br></li>
          <li><p class="text-primary">Withdraw Cash <input type="textbox" name="withdraw"><br></li></p>
	<li><br></li>
          <li><p class="text-primary"> &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp PIN: <input type="password" name="pass"><br></li></p>
	<li><br></li>
        </ul>
        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Proceed</button>
	</form>
      </div>
    </div>

<?php
}
?>
</p>
</div>
</body>
</html>
