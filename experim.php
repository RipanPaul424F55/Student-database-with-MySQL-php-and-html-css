<?php
for($i=0;$i<25;$i++)
{
	for($j=0;$j<3;$j++)
	{echo "<font color='#($i*200)'>using #</font><br>";
	echo "<font color='11$i$j'>without using #</font>";
	}
	if($i/5==0)
		echo "<br>";
}
?>
