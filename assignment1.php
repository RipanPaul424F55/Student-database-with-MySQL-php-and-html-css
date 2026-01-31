<body bgcolor="black">
  <font color="a60a59">
    <b>
    <small>
<?php
$integ=10;
var_dump($integ);//dump information about a variable
echo "<br>";
$fl=10.88;
var_dump($fl);
echo "<br>";
$st="Computer Science";
var_dump($st);
echo "<br>";
$n=NULL;
var_dump($n);
echo "<br>";
$b=102<1102;
var_dump($b);
echo "<br>";
$indexed_array=[0,1,2.43532,NULL,'ac','def'];
var_dump($indexed_array);
echo "<br><br><br>";
$multidimensional_array=[['a','b','c','d'],["p"=>1,"q"=>2,"r"=>3,"s"=>4]];
var_dump($multidimensional_array);
echo "<br><br><br>";
$resource=fopen("student.php","w");
var_dump($resource);
for($i=0;$i<5;$i++)
echo "<br>";
echo "<center> Class operation</center><br><br><br>";
class Class1
{
  public $member_var=4;
  function member_fun()
  {
    return "This is an object";
  }
}
$obj=new Class1();
var_dump($obj);
echo "<br> variable->".$obj->member_var."<br> function return->".$obj->member_fun();
//Scope of variables//
$var=20;
$local_var=30;
echo "<br>";
function func()
{
  global $var;
  $local_var=90;
  static $static_var=1;
  echo "The value of outer variable is ".$var."<br>";
  echo "The value of local variable is ".$local_var."<br>";
  echo "the value of static variabe is ".$static_var."<br>";
  $static_var++;
}
func();
func();
echo "The vaue of outer variable is ".$var."<br>";
echo "The value of outer local var is ".$local_var."<br> it is in the outside of the ".
"function fun ,and changing the value only happen in the function itself thats why its value is changed<br><br><br>";
//SUPERGLOBAL KEYWORD
$val1=100;
$val2=10;
function fun1()
{
  $GLOBALS['val1']=$GLOBALS['val1']+$GLOBALS['val2'];
}
fun1();
echo "super global variable 1 (val1) is ".$val1."<br><br><br>";
//Type Casting
$int=10;
echo "before type casting    ".var_dump($int)."<br> After type casting    ";
$int=(double)$int;
echo var_dump($int)."<br><br>";
echo "before type casting ".var_dump($int)."<br>aftre type casting";
$int=(string)$int;
echo var_dump($int);
//foreach
$a=[1,2,4,5,76,334,'hbfv'];
echo "<br>";
foreach($a as $x)
echo "$x &nbsp;&nbsp;";
 ?>
</small>
</b>
</font>
</body>
