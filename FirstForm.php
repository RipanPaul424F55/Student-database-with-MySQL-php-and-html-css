<?php
$fname=$_GET["fname"];
$lname=$_GET["lname"];
echo "hello $fname $lname";
//Database connection
$conn = new mysqli('localhost','root','','first_time');
if($conn->connect_error)
{
	die('connection failed : '.$conn->connect_error);
}
else
{
	$stmt=$conn->prepare("insert into registration(Firstname,Lastname) values(?,?)");
	$stmt->bind_param("ss",$fname,$lname);
	$stmt->execute();
	echo "Reg done...";
	$stmt->close();
	$conn->close();
}
?>
