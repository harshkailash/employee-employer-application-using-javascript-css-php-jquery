<?php

$con=mysqli_connect("localhost","root","","iwp");  //$con helps in declaring connection variable....hostname,uname,psw,tablename

if(mysqli_connect_errno())//returns error when trying to connect to database
{
	echo "failed to connect to database: ". mysqli_connect_errorno(); //echo=print..... dot is used to connect strings in database
}
$query=mysqli_query($con,"INSERT INTO test VALUES('','ankan')"); //manually insert vallues in the table

?>


<!DOCTYPE html>
<html>
<head>
	<title>SWIRLFEED</title>
</head>
<body>
hello harsh
</body>
</html>