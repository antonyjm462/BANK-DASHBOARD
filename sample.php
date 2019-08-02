<html>
<body>
<?php
$user=$_POST["user"];
$pass=$_POST["pass"];
$suser=$_POST["suser"];
$spass=$_POST["spass"];
$deposit = $_POST["deposit"];
$withdraw = $_POST["withdraw"];
$conn = new mysqli("localhost","antony","root","sales");
if($conn->connect_error){
die("connection failed".$conn->connect_error);
}
$sql=" select * from custlogin where name='$user' and pin='$pass' ";
$sql1=" insert into custlogin values('$suser','$spass',0) ";
$res = $conn->query($sql);
$res1 = $conn->query($sql1);
if( ($res->num_rows > 0) || ( $res1->num_rows > 0)){
?>
<h1>logined</h1>

<?php
}
echo "sucessful";
$sql2 = "select balance from custlogin where name='$user'";
$result2 = $conn->query($sql2);
if($result2->num_rows > 0){
while($row = $result2->fetch_assoc()){
	$balance = (float) $row['balance'];
	echo $balance."<br>";
}}
$balance = $balance + $deposit;
$balance = $balance - $withdraw;
$sql3 = "update custlogin set balance='$balance' where name='$user' and pin='$pass' ";
if($conn->query($sql3)===TRUE){
    echo "updated";}
?>
