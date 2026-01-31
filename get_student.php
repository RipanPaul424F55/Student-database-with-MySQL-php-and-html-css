<body bgcolor="#15feff">
<font color="blue">
<?php
$name=$_POST['fname'];
$phone=$_POST['phone'];
$conn=mysqli_connect('localhost','root','','student_db');
if(!$conn)
	die("Connection failed");
else
{
	if(isset($name) && isset($phone))
	{
	$sql="SELECT * FROM student WHERE name='$name' and phone='$phone';";
	$x=mysqli_query($conn,$sql);
	if($x->num_rows<=0)
		echo "<center><font color='#f51e9f' size='8'>Not Found</font></center>";
	else
	{
		$row=$x->fetch_assoc();
		echo "<table border='1px'> <tr><td>";
		echo "Name</td><td>Title</td><td>Email</td>"
			."<td>Password</td>"."<td>Phone</td>"
			."<td>Nationality</td><td>D.O.B</td>"
			."<td>Gender</td>"."<td>Compulsary1</td>"."<td>Compulsary2</td></tr>";
		echo "<tr><td>".$row['name']."</td><td>".$row['title']."</td><td>".$row['email']
			."</td><td>".$row['pass']."</td><td>".$row['phone']."</td><td>"
			.$row['nat']."</td><td>".$row['dob']."</td><td>".$row['gen']
			."</td><td>".$row['c1']."</td><td>".$row['c2']."</td></tr></table>";
	}
	}
}
?>
</font>
</body>
