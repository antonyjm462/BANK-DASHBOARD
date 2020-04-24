<html>
 <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
$servername= "localhost";
$username = "antony";
$password = "root";
$db = "bank";
$con= new mysqli($servername, $username, $password, $db);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$user=$_POST['user'];
$pass=$_POST['pass'];
$name=$_POST['name'];
$acc=$_POST['type'];
$sql="INSERT INTO custlogin (accnum, PIN) VALUES ('$user', '$pass')";
$sql1="INSERT INTO custbalance (accnum, cusname, curbalance, acctype) VALUES ('$user','$name',0,'$acc')";
if ( ($con->query($sql) === TRUE) && ($con->query($sql1) === TRUE) )                          
{
?>
<div class="container">
<div class="jumbotron">
  <h1 class="display-4">Signed up</h1>
  <hr class="my-4">
  <p>Record Created.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="login.html" role="button">Learn more</a>
  </p>
</div>
</div>
<?php
}else
{
?>
<div class="container">
<div class="jumbotron">
  <h1 class="display-4">Signed up</h1>
  <hr class="my-4">
  <p>Duplicate Found.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="login.html" role="button">Learn more</a>
  </p>
</div>
</div>

<?php
} ?>
</body>
</html>
