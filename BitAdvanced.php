<body bgcolor="#112e33">
<font color="blue" align="center">
<fieldset>
<legend>form output</legend>
<?php
$name=$_POST['fname'];
$title=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$date=$_POST['Date'];
$time=$_POST['Time'];
$nationality=$_POST['nationality'];
$code=$_POST['code'];
$gen=null;
echo "<ol type='1'>";
echo "<li> your name is : $name</li>"."<br>";
echo "<li> your title is : $title</li>"."<br>";
echo "<li>  your email id is :  $email</li>"."<br>";
echo "<li>your password is : $pass</li>"."<br>";
echo "<li> your phone no. is : $phone</li>"."<br>";
echo "<li> your address is : $address</li>"."<br>";
if(isset($_POST['radio']))
{
	echo "<li> your gender is : </li>".$_POST['radio']."<br>";
	$gen=$_POST['radio'];
}
else
	$gen="(not given)";
echo "<li> yout Favorite Programming language is : $code</li>"."<br>";
echo "<li> your nationality is $nationality</li>"."<br>";
echo "<li> the date you have given is $date</li>"."<br>";
echo "<li> the time you have given is $time</li>"."<br>";
echo "</ol>";
//-------------------MAIN DATABASE OPERATION----------------------

//------------------INPUT THE DATAS TO DATABASE-------------------------
echo "<br><br>";
$conn=new mysqli('localhost','root','','student1');//create a connection
if(!$conn)
	die("connection failed the error ->".$mysqli_connect_error);
else
	echo "connection successful"."<br>";
$sql="INSERT INTO student_record(name,title,email,pass,phone,address,date,time,nationality,code,gender) VALUES('$name','$title','$email','$pass','$phone','$address','$date','$time','$nationality','$code','$gen');";//sql query to be executed
$result=mysqli_query($conn,$sql);//add a new record to the database
if($result)
	echo "record was inserted successfully...";
else
	echo "The record was not inserted successfully because of this error->".mysqli_error($conn);
//--------------------OUTPUT THE DATAS FROM DATABASE-----------------------------
$sql="SELECT * FROM student_record;";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0)
{
	echo "<center>";
	echo "<table border='2px'>".
		"<tr>".
		"<th>Name</th>".
		"<th>Title</th>".
		"<th>Email</th>".
		"<th>Password</th>".
		"<th>Phone</th>".
		"<th>Address</th>".
		"<th>Gender</th>".
		"</tr>";
	while($row=$result->fetch_assoc())
	{
		echo "<tr>";
			echo "<td>".$row['name']."</td><td>".$row['title']."</td><td>".$row['email']."</td><td>".$row['pass']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['gender']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
	$sql="DELETE FROM student_record;";
	mysqli_query($conn,$sql);
}
?>
</fieldset>
</font>
</body>
