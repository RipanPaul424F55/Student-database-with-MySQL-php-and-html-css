<body bgcolor="#fffff0">
<fieldset>
<legend>Form Output</legend>
<center>
<?php
function printdata($conn){
	echo "<font color='blue'>";
	$x=mysqli_query($conn,'SELECT * FROM student;');
	if($x->num_rows>0){
	echo "<br>The Database<br>  ('Index' column is not the part of the database)<br>";
	echo "<small>";
	echo "<table border='2px'>";
	echo "<tr>";
	echo "<font color='#30ff00'>";
	echo "<th>Index</th>"."<th>Name</th>"."<th>Title</th>"."<th>email</th>"."<th>password</th>"."<th>phone</th>"
		."<th>nationality</th>"."<th>D.O.B</th>"."<th>Gender</th>"."<th>First compulsary</th>"."<th>Second Compulsary</th>";
	echo "</font></tr>";
	$count=1;
	while($row=$x->fetch_assoc())
	{
		echo "<tr>";
		echo "<td><font color='#ff00a0'><center>$count</center>"
			."</font></td><td><font color='#ff9a00'>".$row['name']
			."</font></td><td><font color='#00ccff'>".$row['title']
			."</font></td><td><font color='#00ff77'>".$row['email']
			."</font></td><td><font color='#96ff00'>".$row['pass']
			."</font></td><td><font color='#fffb00'>".$row['pass']
			."</font></td><td><font color='#ff7200'>".$row['nat']
			."</font></td><td><font color='#ff0098'>".$row['dob']
			."</font></td><td>";
		if($row['gen']=="F")
			echo "<font color='#ff00e6'>Female</font>";
		else if($row['gen']=="M")
			echo "<font color='#0100ff'>Male</font>";
		else
			echo "<font color='#b8ff00'>Other</font>";
		echo "</td><td><font color='#8200ff'>".$row['c1']."</font></td><td>".$row['c2']."</td>";
		echo "</tr>";
		$count++;
	}
	echo "</table></small>";
	}else
		echo "no Data Available";
	echo "</font>";
}
function student_database($conn,$data){
	echo "<br><br>-----------------------------------------------<br>the data<pre>";
	print_r($data);
	echo "</pre>---------------------------------------------------------<br><br>";
	$sql="INSERT INTO student(name,title,email,pass,phone,nat,dob,gen,c1,c2)
		VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]');";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<font color='#ff00be'><br>record inserted successfully<br></font>";
		printdata($conn);
	}else
		echo "<font color='white'>there is a problem generated to insert the data<br>into the database</font>".mysqli_error($conn);
}
$G=null;
if(!isset($_POST['radio']))
{
	echo "<b><font color='red'>Please select the gender</font></b>";
	goto finish;
}
$c1=$_POST['c1'];
$c2=$_POST['c2'];
if($c1=="no" || $c2=="no")
{
	echo "<b><font color='red'>Please Select the compulsary subjects kindly</font></b>";
	goto finish;
}
if($c1==$c2)
{
	echo "<b><font color='green'>Two compulsary subjects are found same<br>Please select Uniquely</font></b>";
	goto finish;
}
$name=$_POST['fname'];
$title=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$ph=$_POST['phone'];
$nat=$_POST['nat'];
$dob=$_POST['dob'];
$g=$_POST['radio'];
//************DATABASE OPERATION**************
$conn=mysqli_connect('localhost','root','','student_db');
if(!$conn)
	die ("there is a problem connecting with the database"." the error is -> ".$mysqli_connect_error);
else
{
	echo "<code><b>connection established successfully</b></code><br>";
	$a=[$name,$title,$email,$pass,$ph,$nat,$dob,$g,$c1,$c2];
	student_database($conn,$a);
}
finish:
echo "                ";
?>
</center>
</fieldset>
</body>
