<?php
ob_start();//turns on output buffering...php is loaded to browser in section this tag saves the data when the php is loading
session_start();//starts the session and stores all the values in it. values will be in the field if it follows the format

$con=mysqli_connect("localhost","root","","iwp");  //$con helps in declaring connection variable....hostname,uname,psw,tablename

if(mysqli_connect_errno())//returns error when trying to connect to database
{
  echo "failed to connect to database: ". mysqli_connect_errorno(); //echo=print..... dot is used to connect strings in database
}
?>