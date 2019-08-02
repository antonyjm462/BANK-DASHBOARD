<html>
<head>
</head>
<body>
<?php
$my = mysqli_connect("localhost","antony","root","bank");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(!$my){
die("couldn't connect");
}else
{
echo "connected";
}

?>
</body>
</html>
